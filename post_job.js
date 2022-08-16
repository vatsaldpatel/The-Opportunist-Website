var count=0;
var l=[];
function btn(){
    var skill = prompt("Enter Skill");
    if (skill==="")
    {
      alert("Add Skill!");
    }
    else{
      l.push(skill);
      count++;
      var d2 = document.createElement("div");
      d2.classList.add("par_div");
      var d1 = document.createElement("div");
      var str="x_"+ count.toString();
      d1.id= str;
      var btn2 =  document.createElement("button");
      btn2.id="btn_"+count.toString();
      btn2.innerHTML= "x";
      btn2.addEventListener("click", function(){

          // alert(this.id);
          var str1=this.id;
          var len = str1.length;
          var index = parseInt(str1.slice(4,len));
          l.splice(index-1,1);
          document.querySelector("#"+str1).parentNode.remove();
        })
          var para = document.createElement("input");
          // para=( document.createElement("input"))
          para.classList.add("input_skill");
          para.id = "input_"+toString(count);
          para.name ="skills";
          para.value=skill
          var node = document.createTextNode("");
          para.style.width="100px";
          para.appendChild(node);

          var element = document.getElementById("form_id");
          d1.appendChild(para);
          d1.appendChild(btn2);
          // d2.appendChild(btn1);
          d2.appendChild(d1);
          element.appendChild(d2);

    }
    
}
// function check(){
//   var x4 = document.querySelector("#c1");
//   var x5 = document.querySelector("#c2");
//   if (x4.value === x5.value)
//   {return true}
//   return false
// }

function add_php(){
  // alert(l);
// if (check()){
  var x= document.querySelector(".temp")
  // var y = document.querySelector(".job_designaton")
  var len = l.length;
  var str1="";
  for (i=0;i<len;i++)
  {
    str1 +=l[i]+";"
  }
  x.value = str1;
  var x1=document.querySelector(".btn3")
  x1.click()
// }
// else{
  // alert("Password Does Not Match")
// }
}



// const hamburger = document.getElementById('hamburger');
// const log = document.getElementById('login_id');
// const nav = document.getElementById('navbar_id');

// hamburger.addEventListener('click', () => {
//   nav.classList.toggle('show');
//   log.classList.toggle('show');
// });


