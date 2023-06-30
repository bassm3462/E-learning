let lessons=document.querySelector("#lessons");
function myaddLesson(){
    lessons.style.display="block";
}function myclose(){
    lessons.style.display="none";
}
myaddLesson();
myclose();
let link=document.getElementById("link");
let file=document.getElementById("file");
function mylink(){
    document.getElementById("link").style.display="block";
    document.getElementById("file").style.display="none";
}
function myfile(){
    document.getElementById("link").style.display="none";
    document.getElementById("file").style.display="block";
}
mylink();
myfile();
// let func_dsiplay=document.getElementById("dsiplay_link").addEventListener("click", function(){
//     document.getElementById("link").style.display="block";
//     document.getElementById("file").style.display="none";
// });
// let func_dsiplay2=document.getElementById("dsiplay_file").addEventListener("click",function(){
//     document.getElementById("dsiplay_link").style.display="none";
//     document.getElementById("dsiplay_file").style.display="block";
// });
// dsiplay_link=function{
//     document.getElementById("link").style.display="block";
//     document.getElementById("file").style.display="none";
// }
// function myfile(){
//    document.getElementById("link").style.display="block";
//     document.getElementById("file").style.display="none";
// }