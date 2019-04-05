//recupérer le controle image sur la page index.html
var image=document.querySelector("#img");
//afficher l'élément selectionné dans la console
console.log(image);
//recupérer le tableau de tous les images
var images=["image/5.jpg","image/54.jpg"
    ,"image/img1.jpeg","image/th1.jpg"];
//ajouter l'evenement du click sur votre image
image.addEventListener("click",function () {
    /*changer l'image en appellant
    la fonction qui change*/
    changeImage();
});
//changer l'image au bout de 3s
setInterval(function () {
    changeImage();
},3000);
//fonction pour changer l'image
function changeImage() {
    //generer un nombre aléatoire entre 4 et 0, 4 exclu
    var mynumber=parseInt(Math.random()*(4-0)+0);
    //afficher le nombre généré dans la console
    console.log(mynumber);
    //changer l'image
    image.src=images[mynumber];
}
//recuperer tous les li se trouvant dans ul
var lis=document.querySelectorAll("ul li");
//lorsqu'on met la souris sur le premier li
lis.forEach(function () {
    var li=this;
    li.addEventListener("click",function () {
        console.log(li);
        li.setAttribute("style",
            "color:red; text-decoration: underline;font-weight: bold;transition: 3s;");
    });
});

