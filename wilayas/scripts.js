// JavaScript Document

 function CreateBookmarkLink() {

 title = "RND - Rassemblement  National Democratique"; 
  // Blogger - Replace with <$BlogItemTitle$> 
  // MovableType - Replace with <$MTEntryTitle$>

 url = "http://www.alger.tv/rnd";
  // Blogger - Replace with <$BlogItemPermalinkURL$> 
  // MovableType - Replace with <$MTEntryPermalink$>
  // WordPress - <?php bloginfo('url'); ?>

	if (window.sidebar) { // Mozilla Firefox Bookmark
		window.sidebar.addPanel(title, url,"");
	} else if( window.external ) { // IE Favorite
		window.external.AddFavorite( url, title); }
	else if(window.opera && window.print) { // Opera Hotlist
		return true; }
 }

/* if (window.external) {
  document.write('<a href = 
     "javascript:CreateBookmarkLink()");">Ajouter ce site  vos favoris</a>'); 
  } else  if (window.sidebar) {
  document.write('<a href = 
    "javascript:CreateBookmarkLink()");">Ajouter ce site  vos favoris</a>'); 
 } else if (window.opera && window.print) {	
   document.write('<a href =
     "javascript:CreateBookmarkLink()");">Ajouter ce site  vos favoris</a>');	 
 } 
*/
 
 function set_date(){
<!--//Date Stamp
		var dayArray = new Array("Dimanche","Lundi","Mardi","Mercredi","Jeudi","Vendredi","Samedi");
		var monthArray = new Array("Janvier","F&eacute;vrier","Mars","Avril","Mai","Juin","Juillet","Aout","Septembre","Octobre","Novembre","D&eacute;cembre");
		var lastUpdate = new Date(document.lastModified);
		var thisDay=dayArray[lastUpdate.getDay()];
		var thisDate=lastUpdate.getDate() < 10 ? '0'+lastUpdate.getDate() : lastUpdate.getDate();
		var thisMonth=monthArray[lastUpdate.getMonth()];
		var thisMonthNum=lastUpdate.getMonth()+1 < 10 ? '0'+ (lastUpdate.getMonth()+1) : lastUpdate.getMonth()+1;
		var thisFullYear=String(lastUpdate.getFullYear());
		var thisYear= thisFullYear.charAt(2) + thisFullYear.charAt(3);

//		document.write("Updated  ");
//		document.write(thisDay + ' ' + thisDate + ' ' + thisMonth + ' ' + thisFullYear+ ',  '+ //lastUpdate.getHours()+':'+lastUpdate.getMinutes());
		document.write(thisDay + ' ' + thisDate + ' ' + thisMonth + ' ' + thisFullYear);
		}
 
 function set_date_ar(){
<!--//Date Stamp
		var now = new Date();
//		var yr = now.getYear();
		
		var lastUpdate = new Date(document.lastModified);
		var yr=String(lastUpdate.getFullYear());
		
		var mName = now.getMonth() + 1;
		var dName = now.getDay() + 1;
		
		var dayNr = ((now.getDate()<10) ? "0" : "")+ now.getDate();
		
		if(dName==1) Day = "الاحد";
		if(dName==2) Day = "الاثنين";
		if(dName==3) Day = "الثلاثاء";
		if(dName==4) Day = "الاربعاء";
		if(dName==5) Day = "الخميس";
		if(dName==6) Day = "الجمعة";
		if(dName==7) Day = "السبت";
		
		if(mName==1) Month="جانفي";
		if(mName==2) Month="فبراير";
		if(mName==3) Month="مارس";
		if(mName==4) Month="ابريل";
		if(mName==5) Month="ماي";
		if(mName==6) Month="جوان";
		if(mName==7) Month="جويلية";
		if(mName==8) Month="اوت";
		if(mName==9) Month="سبتمبر";
		if(mName==10) Month="اكتوبر";
		if(mName==11) Month="نوفمبر";
		if(mName==12) Month="ديسمبر";
		
		   var todaysDate =(" "
		
			   + Day
			   + " "
			   + dayNr
			   + " "
			   + Month
			   + " "
			   + yr
			   + "&nbsp;&nbsp;");
		
		document.write(todaysDate);

		}
 