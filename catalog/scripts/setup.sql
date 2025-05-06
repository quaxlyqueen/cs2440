CREATE DATABASE IF NOT EXISTS catalog;
USE catalog;

CREATE TABLE IF NOT EXISTS user
  (
    id INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(1024) NOT NULL
  );

CREATE TABLE IF NOT EXISTS product
  (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL UNIQUE,
    description VARCHAR(500) NOT NULL,
    image VARCHAR(100),
    price FLOAT NOT NULL
  );

INSERT INTO product (name, description, image, price) VALUES
  ("Anvil", "Need something with a little *oomph* for your next gravity-defying endeavor? Look no further than our classic ACME Anvil! Guaranteed to make a solid impression (literally!) on any situation. Perfect for flattening pesky predators or just adding a bit of 'weight' to your plans!", "1.jpg", 75.00),
  ("Axle Grease", "Is your super-powered contraption squeaking louder than a startled roadrunner? Slap on some ACME Axle Grease! This slick solution ensures your wheels, cogs, and doohickeys run smoother than a freshly paved desert highway. Get ready for friction-free fun!", "2.jpg", 8.50),
  ("Atom Re-Arranger", "Tired of things being... well, *the way they are*? The ACME Atom Re-Arranger is here to (maybe!) help! Want to turn that boulder into a bouncy castle? Or perhaps a giant rubber chicken? Results may vary wildly, but the possibilities are as limitless as your imagination (and our lawyers' disclaimers)!", "3.jpg", 499.99),
  ("Bed Springs", "Dreaming of launching yourself to incredible heights? Our ACME Bed Springs aren't just for comfy naps! These high-tension coils offer *springy* potential for all sorts of acrobatic (and potentially disastrous) maneuvers. Bouncy, bouncy, fun!", "4.jpg", 35.75),
  ("Bird Seed", "Trying to befriend a certain fleet-footed fowl? ACME Bird Seed is the gourmet grub that'll have them pecking at your palm... or at least pausing for a millisecond! A strategic snack for the discerning avian acquaintance!", "5.jpg", 12.20),
  ("Blasting Powder", "Need to make a *big* impact? ACME Blasting Powder delivers! Perfect for clearing obstacles, creating dramatic entrances, or any situation that calls for a significant *boom*! Handle with the utmost... well, you know. Safety first (maybe)!", "6.jpg", 150.00),
  ("Cork", "Sometimes, the simplest solutions are the best! ACME Corks are perfect for plugging up those pesky leaks, crafting miniature rafts, or even as makeshift nose plugs during particularly pungent pursuits. A surprisingly versatile little marvel!", "7.jpg", 2.50),
  ("Disintegration Pistol", "Poof! Be gone, varmint! The ACME Disintegration Pistol (in theory!) breaks down matter at the molecular level. Imagine the possibilities! Just point, *zap*, and say goodbye to unwanted obstacles. (Note: May not work on all cartoon characters.)", "8.jpg", 299.00),
  ("Earthquake Pills", "Shake things up with ACME Earthquake Pills! Feeling like the ground beneath your feet isn't exciting enough? Pop a few of these little dynamos and get ready for some serious rumbles! Side effects may include unexpected geological activity.", "9.jpg", 55.00),
  ("Female Roadrunner costume", "Planning a bit of undercover ornithology? The ACME Female Roadrunner Costume is your ticket to blending in with the fastest crowd! Authentic feathers (may or may not be real), aerodynamic design (questionable), and guaranteed to turn heads (mostly in confusion)!", "10.jpg", 62.99),
  ("Giant Rubber Band", "Need to launch something REALLY far? The ACME Giant Rubber Band is your answer! Stretch it, aim it, and let it FLY! Perfect for sending oversized projectiles or creating hilariously oversized slingshots. Get ready for some serious *snap*!", "11.jpg", 19.95),
  ("Instant Girl", "Lonely? Wish you had a companion for your elaborate schemes? ACME Instant Girl (just add water... maybe?) promises instant companionship! Results are... well, let's just say reality might not meet expectations. But hey, it's worth a shot, right?", "12.jpg", 78.30),
  ("Iron Carrot", "For the discerning herbivore with *very* strong teeth! The ACME Iron Carrot is a nutritional powerhouse of... iron! Its purpose remains a delightful mystery, but it's certainly a conversation starter (if you can lift it!).", "13.jpg", 22.50),
  ("Jet Propelled Unicycle", "Experience the thrill of high-speed, single-wheeled transportation! The ACME Jet Propelled Unicycle is for the extreme adventurer (and those with excellent balance... or a good helmet!). Warning: May result in uncontrolled flight and/or sudden stops.", "14.jpg", 599.00),
  ("Out-Board Motor", "Take your aquatic adventures to the next level with the ACME Out-Board Motor! Attach it to your bathtub, your unicycle (why not?), or any buoyant (or semi-buoyant) object for instant propulsion! Just add water (and maybe a life vest)!", "15.jpg", 210.00),
  ("Railroad Track", "Planning a high-speed chase? Lay down some ACME Railroad Track! This sturdy steel will keep your rocket sled (sold separately) on the right path... until the inevitable curve or cliff! Get ready for some serious locomotion!", "16.jpg", 315.50),
  ("Rocket Sled", "Need to cover ground faster than a speeding roadrunner? The ACME Rocket Sled is your ultimate high-velocity vehicle! Strap in, light the fuse, and prepare for a breathtaking (and potentially bumpy) ride! Safety goggles recommended (but rarely used).", "17.jpg", 850.00),
  ("Super Outfit", "Dreaming of superhuman feats? The ACME Super Outfit (allegedly!) grants the wearer extraordinary abilities! Strength, speed, the power to attract anvils? The possibilities are endless (and unverified)! Suit up and see what happens!", "18.jpg", 95.00),
  ("Time Space Gun", "Messing with the very fabric of reality? The ACME Time Space Gun (handle with *extreme* caution!) allows you to bend the rules of time and space! Want to go back and order more ACME products? Or maybe just avoid that last falling boulder? Use wisely (or not)!", "19.jpg", 675.00),
  ("X-Ray", "See right through things with the amazing ACME X-Ray! Perfect for finding hidden treasures, checking for structural weaknesses (in your opponent's plans, perhaps?), or just getting a peek at what's inside! Batteries not included (probably because we forgot to invent them yet).", "20.jpg", 1.00);
