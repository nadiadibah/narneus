$("#domain").change(function(){
  var sel = $(this).val();
  if(sel == "student"){
    $("#surveyform").load("student.php");
  }
  else if(sel == "schoolhead"){
  	$("#surveyform").load("schoolhead.php");
  }
  else if(sel == "teacher"){
  	$("#surveyform").load("teacher.php");
  }
  else if(sel == "parentandcom"){
  	$("#surveyform").load("parent&community.php");
  }
  else{
  	return false;
  }
});