CREATE DATABASE IF NOT EXISTS catalog;
USE catalog;

CREATE TABLE IF NOT EXISTS user
  (
    id INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(1024) NOT NULL,
    login_token VARCHAR(1024) NOT NULL UNIQUE,
    salt VARCHAR(256) NOT NULL,
    INDEX (login_token)
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
  ("Anvil", "A heavy steel block used for hammering and shaping metal.", "anvil.jpg", 75.00),
  ("Axle Grease", "A thick lubricant used to reduce friction in axles and other moving parts.", "axle_grease.jpg", 8.50),
  ("Atom Re-Arranger", "A device of questionable scientific validity that purports to rearrange atoms.", "atom_rearranger.jpg", 499.99),
  ("Bed Springs", "Coiled metal springs used in mattresses and furniture for support.", "bed_springs.jpeg", 35.75),
  ("Bird Seed", "A mixture of seeds formulated as food for pet birds.", "bird_seed.jpg", 12.20),
  ("Blasting Powder", "An explosive material used for demolition and mining. Handle with extreme caution!", "blasting_powder.JPG", 150.00),
  ("Cork", "The bark of the cork oak tree, often used for bottle stoppers and insulation.", "cork.jpg", 2.50),
  ("Disintegration Pistol", "A fictional weapon capable of breaking down matter at a molecular level.", "disintegration_pistol.png", 299.00),
  ("Earthquake Pills", "Pills that supposedly induce seismic activity. Effects not guaranteed.", "earthquake_pills.jpg", 55.00),
  ("Female Roadrunner costume", "A feathered costume designed to resemble a female roadrunner.", "roadrunner_costume_female.jpg", 62.99),
  ("Giant Rubber Band", "An oversized elastic band, useful for large-scale stretching or launching.", "giant_rubber_band.jpg", 19.95),
  ("Instant Girl", "A product that claims to instantly create a companion. Results may vary significantly.", "instant_girl.jpg", 78.30),
  ("Iron Carrot", "A carrot made of iron. Purpose unclear.", "iron_carrot.jpeg", 22.50),
  ("Jet Propelled Unicycle", "A single-wheeled vehicle powered by a jet engine. For experienced riders only.", "jet_propelled_unicycle.jpg", 599.00),
  ("Out-Board Motor", "A detachable motor mounted on the outside of a boat's transom.", "outboard_motor.jpg", 210.00),
  ("Railroad Track", "A section of steel rail used for train tracks.", "railroad_track.jpeg", 315.50),
  ("Rocket Sled", "A sled propelled by a rocket engine, designed for high-speed travel on rails.", "rocket_sled.jpg", 850.00),
  ("Super Outfit", "A costume that allegedly grants the wearer extraordinary abilities. Claims not verified.", "super_outfit.jpeg", 95.00),
  ("Time Space Gun", "A fictional device that manipulates the fabric of spacetime. Use with caution.", "time_space_gun.jpeg", 675.00),
  ("X-Ray", "An electromagnetic radiation with high energy, often used for medical imaging.", "x_ray.jpeg", 1.00);
