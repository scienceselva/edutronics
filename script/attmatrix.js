
 function cSwap(cell,rollno,pos)
 {

    var attvalue = "";
    var preatt = "";
    var postatt = "";
    var att = "";
    var roltx = "RL".concat(rollno);
    var rolflag = "RLPN".concat(rollno);
    var rolcount = "RLCN".concat(rollno);

    att = document.getElementById(roltx).value;
    
    if (document.getElementById(rolflag).value == "IN" | document.getElementById(rolflag).value == "UN")
    {
    	
    }else{
    	document.getElementById(rolflag).value = document.getElementById(rolflag).value.concat("N");
    }
    if (cell.className == "tick") {
       cell.className = "leave"; 
       attvalue = "L";
	
    }
    else if (cell.className == "leave") {
       cell.className = "abscent"; 
       attvalue = "A";
    }
    else if (cell.className == "abscent") {
       cell.className = "tick"; 
       attvalue = "Y";
    }else{
       cell.className = "tick";
       attvalue = "Y";
    }
    
    preatt = att.substring(0, pos);
    postatt = att.substring(pos+1, att.length);
    var resatt = preatt.concat(attvalue,postatt);

    document.getElementById(roltx).value = resatt;
    
    document.getElementById(rolcount).value = attcnt(resatt);
 
 }



 function ckall(colxx,tothrs)
 {
	colxx = colxx + 1;

	var cells = document.getElementById('attman').getElementsByTagName('td');
	cells[colxx].style.backgroundColor = 'gray';


	tothrs = tothrs + 2;
	var tplen = cells.length / tothrs;
	var stval = tothrs * 2;

	var rolnm = "";
	rollnm = cells[stval].innerHTML;

	cells[stval + colxx].className = "tick";


    	var attvalue = "";
    	var preatt = "";
    	var postatt = "";
  	var att = "";
  	var roltx = "RL".concat(rollnm);
  	var rolflag = "RLPN".concat(rollnm);
        var rolcount = "RLCN".concat(rollnm);

	var pos = colxx - 2;
	
  	att = document.getElementById(roltx).value;
    
        if (document.getElementById(rolflag).value == "IN" | document.getElementById(rolflag).value == "UN")
 	{
    	}else{
 	   	document.getElementById(rolflag).value = document.getElementById(rolflag).value.concat("N");
	}
	attvalue = "Y";



	preatt = att.substring(0, pos);
	postatt = att.substring(pos+1, att.length);
	var resatt = preatt.concat(attvalue,postatt);
	document.getElementById(roltx).value = resatt;

        document.getElementById(rolcount).value = attcnt(resatt);
   
        for (i = 4; i <= tplen; i++) 
        { 

		preatt = "";
		postatt = "";
		resatt = "";
		att = "";

		stval = stval + tothrs
		rollnm = cells[stval].innerHTML;
		cells[stval + colxx].className = "tick";

  		roltx = "RL".concat(rollnm);
	  	rolflag = "RLPN".concat(rollnm);
                rolcount = "RLCN".concat(rollnm);

	 	att = document.getElementById(roltx).value;
    
    	    	if (document.getElementById(rolflag).value == "IN" | document.getElementById(rolflag).value == "UN")
 		{
	    	}else{
 	   		document.getElementById(rolflag).value = document.getElementById(rolflag).value.concat("N");
		}
		attvalue = "Y";

		preatt = att.substring(0, pos);
		postatt = att.substring(pos+1, att.length);
		resatt = preatt.concat(attvalue,postatt);
		document.getElementById(roltx).value = resatt;
                document.getElementById(rolcount).value = attcnt(resatt);
    
	}

 }



 function sowp(part1, part2) 
 {
	    document.getElementById(part1).style.display = 'block';
	    document.getElementById(part2).style.display = 'none';
 }



 function attcnt(attstr)
 {

   var tp1 = 0;
   var tplen = attstr.length;
   var finat=0;

   tp1=attstr.split("Y").length-1;


   if (tp1 >= (tplen/2))
   {
	finat = .5;
   }

   if (tp1 == tplen)
   {
	finat = 1;
   } 
   
   return finat;

 }

 function valrec()
 {

    var x1 = document.forms["addpro"]["attroll"].value;
    if (x1 == null || x1 == "") {
        alert("R.No. must not be empty");
        return false;
    }

    var x2 = document.forms["addpro"]["attname"].value;
    if (x2 == null || x2 == "") {
        alert("Name must not be empty");
        return false;
    }

    //document.forms["addpro"].submit();

 }

