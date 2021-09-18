


(function (Handsontable) {
    /*
    function replaceAll(string, find, replace) {
  return string.replace(new RegExp(escapeRegExp(find), 'g'), replace);
}
*/
    var old_query='';var ayat_separator=",";
  var AutocompleteEditor = Handsontable.editors.HandsontableEditor.prototype.extend();

  AutocompleteEditor.prototype.init = function () {
    Handsontable.editors.HandsontableEditor.prototype.init.apply(this, arguments);

    this.query = null;
    this.choices = [];
  };

  AutocompleteEditor.prototype.createElements = function(){
    Handsontable.editors.HandsontableEditor.prototype.createElements.apply(this, arguments);

    this.$htContainer.addClass('autocompleteEditor');

  };

  AutocompleteEditor.prototype.bindEvents = function(){

    var that = this;
    this.$textarea.on('keydown.autocompleteEditor', function(event){
      if(!Handsontable.helper.isMetaKey(event.keyCode) || [Handsontable.helper.keyCode.BACKSPACE, Handsontable.helper.keyCode.DELETE].indexOf(event.keyCode) != -1){
        setTimeout(function () {
           // console.log('that.$textarea.val() = '+that.$textarea.val());
            
          that.queryChoices(that.$textarea.val());
          
          
        });
      } else if (event.keyCode == Handsontable.helper.keyCode.ENTER && that.cellProperties.strict !== true){
        that.$htContainer.handsontable('deselectCell');
      }

    });

    this.$htContainer.on('mouseleave', function () {
      if(that.cellProperties.strict === true){
        that.highlightBestMatchingChoice();
      }
    });

    this.$htContainer.on('mouseenter', function () {
      that.$htContainer.handsontable('deselectCell');
    });

    Handsontable.editors.HandsontableEditor.prototype.bindEvents.apply(this, arguments);

  };

  var onBeforeKeyDownInner;

  AutocompleteEditor.prototype.open = function () {

    Handsontable.editors.HandsontableEditor.prototype.open.apply(this, arguments);

    this.$textarea[0].style.visibility = 'visible';
    this.focus();

    var choicesListHot =  this.$htContainer.handsontable('getInstance');
    var that = this;
    console.log('txt value ='+this.TEXTAREA.value);
    choicesListHot.updateSettings({
      'colWidths': [this.wtDom.outerWidth(this.TEXTAREA) - 2],
      afterRenderer: function (TD, row, col, prop, value) {
        var caseSensitive = this.getCellMeta(row, col).filteringCaseSensitive === true;
        var indexOfMatch =  caseSensitive ? value.indexOf(this.query) : value.toLowerCase().indexOf(that.query.toLowerCase());
        //console.log('after renderer value ='+value);
          
        if(indexOfMatch != -1){
          var match = value.substr(indexOfMatch, that.query.length);
          TD.innerHTML = value.replace(match, '<strong><i>' + match + '</i></strong>');
          //TD.innerHTML = "test"; - set value dlm dropdown...
          
        }
      }
    });

    onBeforeKeyDownInner = function (event) {
      var instance = this;

      if (event.keyCode == Handsontable.helper.keyCode.ARROW_UP){
        if (instance.getSelected() && instance.getSelected()[0] == 0){

          if(!parent.cellProperties.strict){
            instance.deselectCell();
          }

          parent.instance.listen();
          parent.focus();
          event.preventDefault();
          event.stopImmediatePropagation();
        }
      }

    };

    choicesListHot.addHook('beforeKeyDown', onBeforeKeyDownInner);

    this.queryChoices(this.TEXTAREA.value);
  


  };

  AutocompleteEditor.prototype.close = function () {
      console.log('closing = '+this.TEXTAREA.value);
      console.log('old q = '+old_query);
      this.$textarea.val(old_query+this.TEXTAREA.value);
    this.$htContainer.handsontable('getInstance').removeHook('beforeKeyDown', onBeforeKeyDownInner);

    Handsontable.editors.HandsontableEditor.prototype.close.apply(this, arguments);
    
    console.log('closed = '+this.TEXTAREA.value);
    this.$textarea.val(old_query+this.TEXTAREA.value);
  };
  
  AutocompleteEditor.prototype.finishEditing = function (isCancelled, ctrlDown) {
        this.instance.listen();
        //this.$textarea.select2('destroy');
        var clean_old_query=old_query.substring(0,old_query.lastIndexOf(ayat_separator)+1);
        //clean_old_query=replaceAll(clean_old_query,"\n","");
        
        
        
        if(this.TEXTAREA.value.indexOf(ayat_separator)==-1)
        this.$textarea.val(clean_old_query+"\n"+this.TEXTAREA.value); // SUCCESS !!! SINI BARU JADI EDIT TEXT VALUE !!!
        
        var hujung_ayat=this.$textarea.val().substr(this.$textarea.val().lastIndexOf(ayat_separator) + 1);
        if(hujung_ayat.indexOf("\n")==-1)
        {
            this.$textarea.val(this.$textarea.val().substring(0,this.$textarea.val().lastIndexOf(ayat_separator)+1)+
                    "\n"+hujung_ayat);
        }
        
        
        return Handsontable.editors.TextEditor.prototype.finishEditing.apply(this, arguments);
    };

  AutocompleteEditor.prototype.queryChoices = function(query){
        console.log("old query = "+query);
        old_query=query;
var str=query;
          query=str.substr(str.lastIndexOf(ayat_separator) + 1);
          console.log("query = "+query);
          
          
    this.query = query;

    if (typeof this.cellProperties.source == 'function'){
      var that = this;

      this.cellProperties.source(query, function(choices){
        that.updateChoicesList(choices)
      });

    } else if (Handsontable.helper.isArray(this.cellProperties.source)) {

      var choices;

      if(!query || this.cellProperties.filter === false){
        choices = this.cellProperties.source;
                    //uncomment untuk elak dari terlalu banyak dipaparkan....
      } else {

        var filteringCaseSensitive = this.cellProperties.filteringCaseSensitive === true;
        var lowerCaseQuery = query.toLowerCase();

        choices = this.cellProperties.source.filter(function(choice){
            console.log("choice = "+choice);
          if (filteringCaseSensitive) {
            return choice.indexOf(query) != -1;
          } else {
              
            return choice.toLowerCase().indexOf(lowerCaseQuery) !== -1;//EDITED from Orifginal is !=
          }

        });
      }

      this.updateChoicesList(choices)

    } else {
      this.updateChoicesList([]);
    }

  };

  AutocompleteEditor.prototype.updateChoicesList = function (choices) {

     this.choices = choices;

    this.$htContainer.handsontable('loadData', Handsontable.helper.pivot([choices]));

    if(this.cellProperties.strict === true){
      this.highlightBestMatchingChoice();
    }

    this.focus();
  };

  AutocompleteEditor.prototype.highlightBestMatchingChoice = function () {
    var bestMatchingChoice = this.findBestMatchingChoice();

    if ( typeof bestMatchingChoice == 'undefined' && this.cellProperties.allowInvalid === false){
      bestMatchingChoice = 0;
    }

    if(typeof bestMatchingChoice == 'undefined'){
      this.$htContainer.handsontable('deselectCell');
    } else {
      this.$htContainer.handsontable('selectCell', bestMatchingChoice, 0);
    }

  };

  AutocompleteEditor.prototype.findBestMatchingChoice = function(){
      
    var bestMatch = {};
    var valueLength = this.getValue().length;
    console.log("find best match = "+this.getValue());
    var currentItem;
    var indexOfValue;
    var charsLeft;


    for(var i = 0, len = this.choices.length; i < len; i++){
      currentItem = this.choices[i];

      if(valueLength > 0){
        indexOfValue = currentItem.indexOf(this.getValue())
      } else {
        indexOfValue = currentItem === this.getValue() ? 0 : -1;
      }

      if(indexOfValue == -1) continue;

      charsLeft =  currentItem.length - indexOfValue - valueLength;

      if( typeof bestMatch.indexOfValue == 'undefined'
        || bestMatch.indexOfValue > indexOfValue
        || ( bestMatch.indexOfValue == indexOfValue && bestMatch.charsLeft > charsLeft ) ){

        bestMatch.indexOfValue = indexOfValue;
        bestMatch.charsLeft = charsLeft;
        bestMatch.index = i;

      }

    }

    //alert("this.getValue = "+this.getValue());
    return bestMatch.index;
  };


  Handsontable.editors.AutocompleteEditor = AutocompleteEditor;
  Handsontable.editors.registerEditor('MyEditor', AutocompleteEditor);

})(Handsontable);
