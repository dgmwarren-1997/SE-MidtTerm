const han = document.querySelector(".han");
const slider = document.querySelector(".slider");
const nav = document.querySelector("nav");
const burger = document.querySelector(".burger");
const headline = document.querySelector(".headline");
const headline2 = document.querySelector(".headline2");

const tl = new TimelineMax();

tl.fromTo(
han, 
1, 
{ height: "0%" }, 
{ height: "80%", ease: Power2.easeInOut }
).fromTo(
han, 
1.2, 
{width: "100%"}, 
{width: "80%", ease: Power2.easeInOut  }
).fromTo(
slider, 
1.2, 
{x: "-100%"}, 
{x: "0%", ease: Power2.easeInOut  },
"-=1.2"
).fromTo(
nav,
0.5,
{ opacity: 0, x: 30},
{ opacity: 1, x: 0},
"-=0.5"
).fromTo(
headline,
0.5,
{ opacity: 0, x: 30},
{ opacity: 1, x: 0},
"-=0.5"
);
