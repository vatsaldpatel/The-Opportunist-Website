var str1=""
var str2=""

function home()
{
    var x1 = document.getElementById("home_ip")
    str1 = x1.value;
    var x2 = document.querySelector(".classic")
    str2 = x2.value
    // alert(str1+str2)
    location.replace("job.php")
    var x5 = document.querySelector(".s1")
    x5.click()
}

function job(){
    var x3 = document.querySelector("#t1")
    var x4= document.querySelector("#t2")
    // x3.value = str1
    // x4.value = str2
    // alert(x3.value+x4.value)
    var x5 = document.querySelector("#job_ip")
    var x6= document.querySelector("#city")
    if (x3.value === x5.value && x4.value === x6.value )
    {
        var x6 = document.querySelector(".searchbtn")
        x6.click()
    }
    
}