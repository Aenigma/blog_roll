$(document).ready(function() {
  /**
   * Flips upvote/downvote state
   *
   * @param clicked Element to add upvote class
   * @param notclicked Element to remove class
   * @param chosenclass class name to specify chosen
   * @return true if requires server update, false if not needed
   */
  var swapVote = function(clicked,notclicked,chosenclass) {
    if(clicked.hasClass(chosenclass)) {
      return false;
    } else {
      clicked.addClass(chosenclass);
      notclicked.removeClass(chosenclass);
      return true;
    }
  };
  var updateNumber = function(par,num) {
    par.find('.votes-count').each(function(i) {
        var newValue = (parseInt(this.innerHTML)) + num;
        this.innerHTML = newValue;
        $(this).removeClass("votes-negative votes-positive votes-zero");
        if (newValue == 0) {
          $(this).addClass("votes-zero");
        } else if(newValue > 0) {
          $(this).addClass("votes-positive");
        } else {
          $(this).addClass("votes-negative");
        }
    });
  };
  $(".vote-icon.vote-icon-up").click(function (clickEvent) {
    clickEvent.preventDefault();
    var url = $(this).data("url");
    var thisbutton = $(this);
    var complement = $(this).parent().find(".vote-icon.vote-icon-down");
    var parentElement = $(this).parent();
    $.post(url,function(result){
        if(result["result"]) {
          updateNumber(parentElement,1);
          swapVote(thisbutton,complement,"checked");
        } else {
          alert(result["error"]);
        }
      });
  });
  $(".vote-icon.vote-icon-down").click(function (clickEvent) {
    clickEvent.preventDefault();
    var url = $(this).data("url");
    var thisbutton = $(this);
    var complement = $(this).parent().find(".vote-icon.vote-icon-up");
    var parentElement = $(this).parent();
    $.post(url,function(result){
        if(result["result"]) {
          updateNumber(parentElement,-1);
          swapVote(thisbutton,complement,"checked");
        } else {
          alert(result["error"]);
        }
      });
  });
});
