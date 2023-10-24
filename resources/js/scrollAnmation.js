import { gsap } from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";
gsap.registerPlugin(ScrollTrigger);

const ScrollAnimation = () => {
  // let sections = gsap.utils.toArray(".scroll-section");
  let circle = gsap.utils.toArray(".cirlce circle");
  gsap.set(circle,{
    x:-50,
  })
  gsap.to(circle, {
    duration: 1,
    x:0,
    ease: "power1.inOut",
    stagger: 0.2
    
  })
  // gsap.to(sections, {
  //   xPercent: -100 * (sections.length - 1),
  //   ease: "none",
  //   scrollTrigger: {
  //     trigger: ".entry-content",
  //     pin: true,
  //     scrub: 1,
  //     end: "+=1500",
  //   }
  // });

};

export default ScrollAnimation;
