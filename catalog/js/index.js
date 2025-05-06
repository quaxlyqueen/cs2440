const bg = document.querySelector("#bg");
const bubbles = document.querySelectorAll(".bubble"); // Get bubbles *after* the page has loaded
const cart_btn = document.querySelector("#add_to_cart_btn");

const colors = [
  "#cedff3",
  "#adcaeb",
  "#ffd700",
  "#f4a460",
  "#1e90ff",
  "#dc143c",
  "#7CFC00",
];

const text_colors = ["#f4a460", "#1e90ff", "#dc143c"];

let welcome = document.querySelector("#welcome");
if (welcome != null) {
  let h1 = welcome.querySelector("h1");
  let p = welcome.querySelector("p");

  let color = text_colors[Math.floor(Math.random() * colors.length)];
  h1.style.color = color;
  p.style.color = color;
}

function initial_bubbles() {
  bubbles.forEach((bubble) => {
    let size = Math.ceil(Math.random() * 100) + 50;
    let color = colors[Math.floor(Math.random() * colors.length)];
    let x = Math.floor(Math.random() * bg.offsetWidth) - size + 100;
    let y = Math.floor(Math.random() * bg.offsetHeight) - size + 100;
    const delay = Math.random() * 5 + "s";
    const duration = Math.random() * 10 * Math.random() + 15 + "s";

    let randomX = (Math.random() - 0.5) * 500;
    let randomY = (Math.random() - 0.5) * 500;

    while (randomX < 0 || randomX > window.innerWidth)
      randomX = (Math.random() - 0.5) * 500;

    while (randomY < 0 || randomY > window.innerHeight)
      randomY = (Math.random() - 0.5) * 500;

    randomX = randomX + "px";
    randomY = randomY + "px";

    let a = Math.random();
    let b = Math.random();
    let c = Math.random();
    let d = Math.random();

    if (Math.random() > 0.2) a *= -1;

    if (Math.random() > 0.7) b *= -1;

    if (Math.random() > 0.6) c *= -1;

    if (Math.random() > 0.9) d *= -1;

    if (Math.random() > 0.5) {
      let curveX = (Math.random() - 0.5) * 500 + "px";
      let curveY = (Math.random() - 0.5) * 500 + "px";
      bubble.style.setProperty("--curve-x", curveX);
      bubble.style.setProperty("--curve-y", curveY);
      bubble.style.animationName = "float-curve";
    } else {
      bubble.style.animationName = "float-random";
    }

    bubble.style.position = "absolute";
    bubble.style.top = y + "px";
    bubble.style.left = x + "px";
    bubble.style.height = size + "px";
    bubble.style.width = size + "px";
    bubble.style.borderRadius = "50%";
    bubble.style.backgroundColor = color;
    bubble.style.opacity = 1;
    bubble.style.setProperty("--random-x", randomX);
    bubble.style.setProperty("--random-y", randomY);
    bubble.style.animationDelay = delay;
    bubble.style.animationDuration = duration;
    bubble.style.animationTimingFunction =
      "cubic-bezier(" + a + ", " + b + ", " + c + ", " + d + ")";
    bubble.style.boxShadow = "6px 6px 14px rgba(0, 0, 0, 0.45)";
  });
}

initial_bubbles();
if (document.startViewTransition) {
  window.navigation.addEventListener("navigate", () =>
    document.startViewTransition(),
  );
}

//
// // Function to capture the current state of the bubbles
// function captureBubbleStates() {
//   const bubbles = document.querySelectorAll(".bubble");
//   bubbleStates = Array.from(bubbles).map((bubble) => ({
//     left: bubble.style.left,
//     top: bubble.style.top,
//     width: bubble.style.width,
//     height: bubble.style.height, // Added height
//     backgroundColor: bubble.style.backgroundColor,
//     opacity: bubble.style.opacity,
//     delay: bubble.style.animationDelay,
//     dur: bubble.style.animationDuration,
//     ran_x: getComputedStyle(bubble).getPropertyValue("--random-x"),
//     ran_y: getComputedStyle(bubble).getPropertyValue("--random-y"),
//   }));
//
//   try {
//     window.name = JSON.stringify(bubbleStates);
//   } catch (error) {
//     console.error("Error stringifying bubble states:", error);
//     window.name = ""; // Clear window.name in case of error
//   }
// }
//
// // Function to apply the stored states to the new bubbles
// function applyBubbleStates() {
//   try {
//     const storedStates = JSON.parse(window.name);
//     if (storedStates && storedStates.length > 0) {
//       const newBubbles = document.querySelectorAll(".bubble");
//       newBubbles.forEach((bubble, index) => {
//         if (storedStates[index]) {
//           bubble.style.left = storedStates[index].left;
//           bubble.style.top = storedStates[index].top;
//           bubble.style.width = storedStates[index].width;
//           bubble.style.height = storedStates[index].width;
//           bubble.style.backgroundColor = storedStates[index].backgroundColor;
//           bubble.style.borderRadius = "50%";
//           bubble.style.position = "absolute"; // Ensure they are absolutely positioned
//           bubble.style.opacity = storedStates[index].opacity;
//           bubble.style.animationDuration = storedStates[index].dur;
//           bubble.style.setProperty("--random-x", storedStates[index].ran_x);
//           bubble.style.setProperty("--random-y", storedStates[index].ran_y);
//         }
//       });
//
//       bubbleStates = storedStates; // Update the local variable
//     } else {
//       initial_bubbles();
//     }
//   } catch (error) {
//     console.error("Error parsing window.name:", error);
//     initial_bubbles();
//   }
// }
//
// // Event listeners
// window.addEventListener("load", applyBubbleStates);
// window.addEventListener("beforeunload", captureBubbleStates);
//
// // View Transitions API Handling
// if (document.startViewTransition) {
//   window.navigation.addEventListener("navigate", (event) => {
//     const promise = Promise.resolve()
//       .then(captureBubbleStates)
//       .then(() =>
//         document.startViewTransition(async () => {
//           await event.destination.loadPromise;
//           applyBubbleStates();
//         }),
//       );
//   });
// } else {
//   console.log("ViewTransition API not supported");
//   initial_bubbles();
// }
