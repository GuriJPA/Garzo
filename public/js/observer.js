function ListaCheckBoxSlaves(){
    this.ListaCheckBoxSlaves = [];
  }
   
  ListaCheckBoxSlaves.prototype.add = function( obj ){
    return this.ListaCheckBoxSlaves.push( obj );
  };
   
  ListaCheckBoxSlaves.prototype.count = function(){
    return this.ListaCheckBoxSlaves.length;
  };
   
  ListaCheckBoxSlaves.prototype.get = function( index ){
    if( index > -1 && index < this.ListaCheckBoxSlaves.length ){
      return this.ListaCheckBoxSlaves[ index ];
    }
  };
   
  ListaCheckBoxSlaves.prototype.indexOf = function( obj, startIndex ){
    var i = startIndex;
   
    while( i < this.ListaCheckBoxSlaves.length ){
      if( this.ListaCheckBoxSlaves[i] === obj ){
        return i;
      }
      i++;
    }
   
    return -1;
  };
   
  ListaCheckBoxSlaves.prototype.removeAt = function( index ){
    this.ListaCheckBoxSlaves.splice( index, 1 );
  };

  function checkBoxMaster(){
    this.observers = new ListaCheckBoxSlaves();
  }
   
  checkBoxMaster.prototype.addObserver = function( observer ){
    this.observers.add( observer );
  };
   
  checkBoxMaster.prototype.removeObserver = function( observer ){
    this.observers.removeAt( this.observers.indexOf( observer, 0 ) );
  };
   
  checkBoxMaster.prototype.notify = function( context ){
    var observerCount = this.observers.count();
    for(var i=0; i < observerCount; i++){
      this.observers.get(i).update( context );
    }
  };

  // The Observer
function checkBoxSlave(){
    this.update = function(){
      // ...
      
    };
  }


  // Extend an object with an extension
function extend( obj, extension ){
    for ( var key in extension ){
      obj[key] = extension[key];
    }
  }
   
  // References to our DOM elements
   
  var controlCheckbox = document.getElementById( "mainCheckbox" );

   
   
  // Concrete checkBoxMaster
   
  // Extend the controlling checkbox with the checkBoxMaster class
  extend( controlCheckbox, new checkBoxMaster() );
   
  // Clicking the checkbox will trigger notifications to its observers
  controlCheckbox.onclick = function(){
    controlCheckbox.notify( controlCheckbox.checked );
  };
   
  
   
  // Concrete Observer


  addNewObserver();


  function addNewObserver(){

    for (let i = 0; i < num_prod_ch; i++) {
        create_check(i);
    }

  }



  function create_check(i){

    var check = document.getElementById(i);
   
    // Extend the checkbox with the Observer class
    extend( check, new checkBoxSlave() );
    

    // Override with custom update behaviour
    check.update = function( value ){
      this.checked = value;
    };
   
    // Add the new observer to our list of observers
    // for our main checkBoxMaster
    controlCheckbox.addObserver( check );
      
  }


  

  








