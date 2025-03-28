-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 28, 2025 at 04:49 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `recipeDB`
--

-- --------------------------------------------------------

--
-- Table structure for table `Ingredients`
--

CREATE TABLE `Ingredients` (
  `IngredientID` int(11) NOT NULL,
  `RecipeID` int(11) DEFAULT NULL,
  `IngredientName` varchar(255) NOT NULL,
  `Quantity` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Ingredients`
--

INSERT INTO `Ingredients` (`IngredientID`, `RecipeID`, `IngredientName`, `Quantity`) VALUES
(1, 1, 'Spaghetti', '400g'),
(2, 1, 'Ground Beef', '500g'),
(3, 1, 'Tomato Sauce', '200g'),
(4, 1, 'Garlic', '2 cloves'),
(5, 1, 'Onion', '1'),
(6, 2, 'Chicken Breast', '2 pieces'),
(7, 2, 'Curry Powder', '2 tbsp'),
(8, 2, 'Coconut Milk', '400ml'),
(9, 2, 'Garlic', '3 cloves'),
(10, 2, 'Ginger', '1-inch piece'),
(11, 3, 'Flour', '200g'),
(12, 3, 'Egg', '2'),
(13, 3, 'Milk', '100ml'),
(14, 3, 'Baking Powder', '1 tsp'),
(15, 3, 'Sugar', '2 tbsp'),
(16, 4, 'Mixed Vegetables', '300g'),
(17, 4, 'Soy Sauce', '2 tbsp'),
(18, 4, 'Garlic', '2 cloves'),
(19, 4, 'Sesame Oil', '1 tbsp'),
(20, 4, 'Rice', '1 cup'),
(21, 5, 'Beef', '600g'),
(22, 5, 'Potatoes', '4'),
(23, 5, 'Carrots', '2'),
(24, 5, 'Onion', '1'),
(25, 5, 'Beef Broth', '500ml'),
(26, 6, 'Cocoa Powder', '50g'),
(27, 6, 'Butter', '100g'),
(28, 6, 'Sugar', '150g'),
(29, 6, 'Egg', '3'),
(30, 6, 'Flour', '200g'),
(31, 7, 'Lettuce', '1 head'),
(32, 7, 'Croutons', '1 cup'),
(33, 7, 'Caesar Dressing', '3 tbsp'),
(34, 7, 'Parmesan Cheese', '50g'),
(35, 7, 'Bacon', '3 strips'),
(36, 8, 'Bread', '4 slices'),
(37, 8, 'Cheese', '4 slices'),
(38, 8, 'Butter', '2 tbsp'),
(39, 8, 'Tomato', '1'),
(40, 8, 'Garlic', '2 cloves'),
(41, 9, 'Ground Beef', '500g'),
(42, 9, 'Taco Shells', '12'),
(43, 9, 'Lettuce', '1 head'),
(44, 9, 'Tomatoes', '2'),
(45, 9, 'Cheddar Cheese', '100g'),
(46, 10, 'Fettuccine', '300g'),
(47, 10, 'Heavy Cream', '200ml'),
(48, 10, 'Parmesan Cheese', '100g'),
(49, 10, 'Butter', '50g'),
(50, 10, 'Garlic', '2 cloves'),
(56, 12, 'Ground Beef', '400g'),
(57, 12, 'Empanada Dough', '12 pieces'),
(58, 12, 'Onion', '1'),
(59, 12, 'Garlic', '2 cloves'),
(60, 12, 'Cumin', '1 tsp'),
(61, 13, 'Eggplant', '2'),
(62, 13, 'Mozzarella Cheese', '200g'),
(63, 13, 'Tomato Sauce', '100g'),
(64, 13, 'Parmesan Cheese', '50g'),
(65, 13, 'Basil', '1 bunch'),
(76, 16, 'Chicken Breast', '2 pieces'),
(77, 16, 'Marsala Wine', '100ml'),
(78, 16, 'Mushrooms', '200g'),
(79, 16, 'Garlic', '2 cloves'),
(80, 16, 'Olive Oil', '1 tbsp'),
(81, 17, 'Chicken Breast', '2 pieces'),
(82, 17, 'Breadcrumbs', '1 cup'),
(83, 17, 'Mozzarella Cheese', '200g'),
(84, 17, 'Marinara Sauce', '200g'),
(85, 17, 'Parmesan Cheese', '50g'),
(86, 18, 'Chicken Breast', '2 pieces'),
(87, 18, 'Bell Peppers', '2'),
(88, 18, 'Soy Sauce', '2 tbsp'),
(89, 18, 'Garlic', '2 cloves'),
(90, 18, 'Ginger', '1-inch piece'),
(91, 19, 'Ground Beef', '500g'),
(92, 19, 'Taco Shells', '12'),
(93, 19, 'Lettuce', '1 head'),
(94, 19, 'Tomato', '1'),
(95, 19, 'Cheddar Cheese', '100g'),
(96, 20, 'Pork Cutlets', '4 pieces'),
(97, 20, 'Flour', '1 cup'),
(98, 20, 'Egg', '2'),
(99, 20, 'Breadcrumbs', '1 cup'),
(100, 20, 'Lemon', '2'),
(101, 21, 'Beef', '600g'),
(102, 21, 'Potatoes', '4'),
(103, 21, 'Carrots', '2'),
(104, 21, 'Onion', '1'),
(105, 21, 'Beef Broth', '500ml'),
(106, 22, 'Cocoa Powder', '50g'),
(107, 22, 'Butter', '100g'),
(108, 22, 'Sugar', '150g'),
(109, 22, 'Egg', '3'),
(110, 22, 'Flour', '200g'),
(111, 23, 'Lettuce', '1 head'),
(112, 23, 'Croutons', '1 cup'),
(113, 23, 'Caesar Dressing', '3 tbsp'),
(114, 23, 'Parmesan Cheese', '50g'),
(115, 23, 'Bacon', '3 strips'),
(116, 24, 'Bread', '4 slices'),
(117, 24, 'Cheese', '4 slices'),
(118, 24, 'Butter', '2 tbsp'),
(119, 24, 'Tomato', '1'),
(120, 24, 'Garlic', '2 cloves'),
(121, 25, 'Ground Beef', '500g'),
(122, 25, 'Taco Shells', '12'),
(123, 25, 'Lettuce', '1 head'),
(124, 25, 'Tomatoes', '2'),
(125, 25, 'Cheddar Cheese', '100g'),
(126, 26, 'Fettuccine', '300g'),
(127, 26, 'Heavy Cream', '200ml'),
(128, 26, 'Parmesan Cheese', '100g'),
(129, 26, 'Butter', '50g'),
(130, 26, 'Garlic', '2 cloves'),
(131, 27, 'Arborio Rice', '300g'),
(132, 27, 'Mushrooms', '200g'),
(133, 27, 'Vegetable Broth', '500ml'),
(134, 27, 'Parmesan Cheese', '50g'),
(135, 27, 'White Wine', '100ml'),
(136, 28, 'Ground Beef', '400g'),
(137, 28, 'Empanada Dough', '12 pieces'),
(138, 28, 'Onion', '1'),
(139, 28, 'Garlic', '2 cloves'),
(140, 28, 'Cumin', '1 tsp'),
(141, 29, 'Eggplant', '2'),
(142, 29, 'Mozzarella Cheese', '200g'),
(143, 29, 'Tomato Sauce', '100g'),
(144, 29, 'Parmesan Cheese', '50g'),
(145, 29, 'Basil', '1 bunch'),
(146, 30, 'Fish Fillets', '500g'),
(147, 30, 'Tortillas', '12'),
(148, 30, 'Cabbage', '1/2 head'),
(149, 30, 'Lime', '2'),
(150, 30, 'Avocado', '1'),
(151, 31, 'Cucumber', '1'),
(152, 31, 'Tomato', '1'),
(153, 31, 'Olives', '50g'),
(154, 31, 'Feta Cheese', '100g'),
(155, 31, 'Olive Oil', '2 tbsp'),
(156, 32, 'Chicken Breast', '2 pieces'),
(157, 32, 'Marsala Wine', '100ml'),
(158, 32, 'Mushrooms', '200g'),
(159, 32, 'Garlic', '2 cloves'),
(160, 32, 'Olive Oil', '1 tbsp'),
(161, 33, 'Chicken Breast', '2 pieces'),
(162, 33, 'Breadcrumbs', '1 cup'),
(163, 33, 'Mozzarella Cheese', '200g'),
(164, 33, 'Marinara Sauce', '200g'),
(165, 33, 'Parmesan Cheese', '50g'),
(166, 34, 'Chicken Breast', '2 pieces'),
(167, 34, 'Bell Peppers', '2'),
(168, 34, 'Soy Sauce', '2 tbsp'),
(169, 34, 'Garlic', '2 cloves'),
(170, 34, 'Ginger', '1-inch piece'),
(171, 35, 'Ground Beef', '500g'),
(172, 35, 'Taco Shells', '12'),
(173, 35, 'Lettuce', '1 head'),
(174, 35, 'Tomato', '1'),
(175, 35, 'Cheddar Cheese', '100g'),
(176, 36, 'Pork Cutlets', '4 pieces'),
(177, 36, 'Flour', '1 cup'),
(178, 36, 'Egg', '2'),
(179, 36, 'Breadcrumbs', '1 cup'),
(180, 36, 'Lemon', '2'),
(181, 37, 'Beef Tenderloin', '1kg'),
(182, 37, 'Puff Pastry', '500g'),
(183, 37, 'Mushrooms', '200g'),
(184, 37, 'Prosciutto', '100g'),
(185, 37, 'Egg Yolk', '1'),
(186, 38, 'Shrimp', '500g'),
(187, 38, 'Garlic', '4 cloves'),
(188, 38, 'Linguine', '200g'),
(189, 38, 'Olive Oil', '2 tbsp'),
(190, 38, 'Lemon', '1'),
(191, 39, 'Chicken Breast', '2 pieces'),
(192, 39, 'Rice', '2 cups'),
(193, 39, 'Frozen Peas', '1/2 cup'),
(194, 39, 'Soy Sauce', '2 tbsp'),
(195, 39, 'Green Onion', '1 stalk'),
(196, 40, 'Lasagna Noodles', '12 sheets'),
(197, 40, 'Ground Beef', '500g'),
(198, 40, 'Ricotta Cheese', '250g'),
(199, 40, 'Mozzarella Cheese', '300g'),
(200, 40, 'Tomato Sauce', '500g'),
(201, 41, 'Chicken Breast', '2 pieces'),
(202, 41, 'Tortillas', '4'),
(203, 41, 'Cheddar Cheese', '100g'),
(204, 41, 'Bell Pepper', '1'),
(205, 41, 'Sour Cream', '2 tbsp'),
(206, 42, 'Crab Meat', '500g'),
(207, 42, 'Breadcrumbs', '1/2 cup'),
(208, 42, 'Egg', '1'),
(209, 42, 'Mayonnaise', '2 tbsp'),
(210, 42, 'Old Bay Seasoning', '1 tsp'),
(211, 43, 'Tomato', '2'),
(212, 43, 'Mozzarella Cheese', '200g'),
(213, 43, 'Basil', '1 bunch'),
(214, 43, 'Balsamic Vinegar', '1 tbsp'),
(215, 43, 'Olive Oil', '2 tbsp'),
(216, 44, 'Beef', '500g'),
(217, 44, 'Onion', '1'),
(218, 44, 'Mushrooms', '200g'),
(219, 44, 'Sour Cream', '100g'),
(220, 44, 'Beef Broth', '200ml'),
(221, 45, 'Spaghetti', '300g'),
(222, 45, 'Bacon', '4 strips'),
(223, 45, 'Egg', '2'),
(224, 45, 'Parmesan Cheese', '50g'),
(225, 45, 'Garlic', '2 cloves'),
(226, 46, 'Chicken Breast', '2 pieces'),
(227, 46, 'Breadcrumbs', '1 cup'),
(228, 46, 'Marinara Sauce', '200g'),
(229, 46, 'Mozzarella Cheese', '150g'),
(230, 46, 'Parmesan Cheese', '50g'),
(231, 47, 'Spaghetti', '300g'),
(232, 47, 'Ground Beef', '500g'),
(233, 47, 'Tomato Sauce', '500g'),
(234, 47, 'Carrot', '1'),
(235, 47, 'Onion', '1'),
(236, 48, 'Broccoli', '200g'),
(237, 48, 'Carrots', '2'),
(238, 48, 'Bell Peppers', '2'),
(239, 48, 'Soy Sauce', '2 tbsp'),
(240, 48, 'Ginger', '1-inch piece'),
(241, 49, 'Ground Beef', '500g'),
(242, 49, 'Breadcrumbs', '1/2 cup'),
(243, 49, 'Egg', '1'),
(244, 49, 'Tomato Sauce', '500g'),
(245, 49, 'Parmesan Cheese', '50g'),
(246, 50, 'Flour', '200g'),
(247, 50, 'Sugar', '2 tbsp'),
(248, 50, 'Egg', '1'),
(249, 50, 'Milk', '300ml'),
(250, 50, 'Baking Powder', '2 tsp'),
(251, 51, 'Chicken Breast', '2 pieces'),
(252, 51, 'Olive Oil', '2 tbsp'),
(253, 51, 'Lemon', '1'),
(254, 51, 'Garlic', '2 cloves'),
(255, 51, 'Rosemary', '1 sprig'),
(256, 52, 'Shrimp', '500g'),
(257, 52, 'Tortillas', '12'),
(258, 52, 'Lettuce', '1 head'),
(259, 52, 'Avocado', '1'),
(260, 52, 'Cabbage', '1/2 head'),
(261, 53, 'Chicken Breast', '2 pieces'),
(262, 53, 'Lettuce', '1 head'),
(263, 53, 'Caesar Dressing', '3 tbsp'),
(264, 53, 'Parmesan Cheese', '50g'),
(265, 53, 'Croutons', '1 cup'),
(266, 54, 'Chicken Breast', '2 pieces'),
(267, 54, 'Bell Peppers', '2'),
(268, 54, 'Onion', '1'),
(269, 54, 'Fajita Seasoning', '1 tbsp'),
(270, 54, 'Tortillas', '12'),
(271, 55, 'Ground Lamb', '500g'),
(272, 55, 'Potatoes', '4'),
(273, 55, 'Carrots', '2'),
(274, 55, 'Onion', '1'),
(275, 55, 'Peas', '1/2 cup'),
(276, 56, 'Pork Chops', '4 pieces'),
(277, 56, 'Apple', '1'),
(278, 56, 'Onion', '1'),
(279, 56, 'Garlic', '2 cloves'),
(280, 56, 'Rosemary', '1 sprig'),
(281, 57, 'Pasta', '300g'),
(282, 57, 'Basil', '1 bunch'),
(283, 57, 'Parmesan Cheese', '50g'),
(284, 57, 'Olive Oil', '3 tbsp'),
(285, 57, 'Pine Nuts', '2 tbsp'),
(286, 58, 'Arborio Rice', '300g'),
(287, 58, 'Mushrooms', '200g'),
(288, 58, 'Vegetable Broth', '500ml'),
(289, 58, 'Parmesan Cheese', '50g'),
(290, 58, 'White Wine', '100ml'),
(291, 59, 'Pork Ribs', '1 rack'),
(292, 59, 'BBQ Sauce', '1/2 cup'),
(293, 59, 'Garlic', '2 cloves'),
(294, 59, 'Onion', '1'),
(295, 59, 'Paprika', '1 tbsp'),
(296, 60, 'Ground Beef', '500g'),
(297, 60, 'Taco Shells', '12'),
(298, 60, 'Lettuce', '1 head'),
(299, 60, 'Tomato', '1'),
(300, 60, 'Cheddar Cheese', '100g');

-- --------------------------------------------------------

--
-- Table structure for table `Recipes`
--

CREATE TABLE `Recipes` (
  `RecipeID` int(11) NOT NULL,
  `RecipeName` varchar(255) NOT NULL,
  `Instructions` text DEFAULT NULL,
  `PrepTime` int(11) DEFAULT NULL,
  `Servings` int(11) DEFAULT NULL,
  `Photo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Recipes`
--

INSERT INTO `Recipes` (`RecipeID`, `RecipeName`, `Instructions`, `PrepTime`, `Servings`, `Photo`) VALUES
(1, 'Spaghetti Bolognese', 'Heat olive oil in a large pan over medium heat. Add diced onions, carrots, and celery, and cook until softened. Add minced garlic and cook for 1 minute. Stir in ground beef and cook until browned. Add tomato paste, crushed tomatoes, and red wine. Season with salt, pepper, and dried herbs. Simmer for 30-45 minutes, stirring occasionally. Cook spaghetti according to package instructions. Serve the sauce over the spaghetti and garnish with fresh basil and parmesan cheese.', 45, 4, 'uploads/SpaghettiBolognese.webp'),
(2, 'Chicken Curry', 'In a large pan, heat olive oil over medium heat. Add chicken breast pieces and cook until browned and cooked through. Remove chicken from the pan and set aside. In the same pan, melt butter and add garlic. Cook for 1 minute, then add heavy cream and bring to a simmer. Stir in parmesan cheese until melted and the sauce thickens. Return chicken to the pan, toss to coat, and simmer for 5 more minutes. Serve with fettuccine noodles.', 50, 4, 'uploads/ChickenCurry.jpg'),
(3, 'Pancakes', 'In a large bowl, toss together romaine lettuce, croutons, and grated parmesan cheese. In a small bowl, whisk together mayonnaise, Dijon mustard, anchovy paste, lemon juice, garlic, and olive oil. Season with salt and pepper. Pour the dressing over the salad and toss until evenly coated. Serve immediately with extra parmesan and croutons.', 20, 2, 'uploads/Pancakes.jpg'),
(4, 'Vegetable Stir Fry', 'Preheat oven to 475°F (245°C). Roll out pizza dough on a floured surface to your desired thickness. Place the dough on a pizza stone or baking sheet. Spread tomato sauce over the dough, leaving a border around the edges. Tear fresh mozzarella cheese into pieces and scatter over the pizza. Drizzle with olive oil and sprinkle with fresh basil leaves. Bake for 10-12 minutes, or until the crust is golden and the cheese is bubbly and melted. Serve immediately.', 25, 3, 'uploads/VegetableStirFry.jpg'),
(5, 'Beef Stew', 'In a large pot, brown beef stew meat in batches over medium heat. Remove the beef and set aside. In the same pot, cook onions, carrots, and celery until softened. Add garlic and cook for 1 minute. Stir in flour and cook for 2 minutes. Add beef broth, diced tomatoes, and bay leaves. Return the beef to the pot and bring to a boil. Reduce heat, cover, and simmer for 1-2 hours, until the beef is tender. Season with salt, pepper, and fresh parsley.', 120, 6, 'uploads/BeefStew.jpg'),
(6, 'Chocolate Cake', 'Heat oil in a large pan over medium heat. Add diced onions, garlic, and ginger and cook until softened. Stir in curry powder, turmeric, cumin, and chili powder. Add diced chicken breast and cook until browned. Pour in coconut milk and bring to a simmer. Cook for 20 minutes until the sauce thickens and the chicken is cooked through. Season with salt and serve with steamed rice.', 60, 8, 'uploads/ChocolateCake.jpg'),
(7, 'Caesar Salad', 'Brown ground beef in a large pan over medium heat. Drain any excess fat. Stir in taco seasoning and cook for 5 minutes. Warm taco shells in the oven or microwave. Fill each taco shell with the beef mixture, then top with shredded lettuce, diced tomatoes, cheese, sour cream, and salsa. Serve immediately.', 15, 2, 'uploads/CaesarSalad.jpg'),
(8, 'Grilled Cheese', 'Butter one side of each slice of bread. Place a slice of cheese between the unbuttered sides of the bread. Heat a pan over medium heat and place the sandwich in the pan, buttered side down. Grill for 3-4 minutes, then flip and grill the other side for an additional 3-4 minutes, until golden brown and the cheese is melted. Serve immediately.', 10, 1, 'uploads/GrilledCheese.jpg'),
(9, 'Tacos', 'Grill or pan-sear chicken breasts and slice them thinly. In a bowl, toss romaine lettuce with Caesar dressing, croutons, and grated parmesan. Place the lettuce mixture and chicken slices on a large tortilla. Roll up the tortilla, folding in the sides as you go. Slice in half and serve immediately.', 30, 4, 'uploads/Tacos.jpg'),
(10, 'Chicken Alfredo', 'Preheat oven to 350°F (175°C). In a bowl, combine ground beef, breadcrumbs, eggs, milk, chopped onion, garlic, salt, and pepper. Form the mixture into a loaf and place it in a greased baking dish. In a small bowl, mix ketchup, brown sugar, and mustard and spread the glaze over the top of the meatloaf. Bake for 45-60 minutes, or until the meatloaf is fully cooked. Let it rest for 10 minutes before slicing.', 40, 4, 'uploads/ChickenAlfredo.jpg'),
(12, 'Tomato Soup', 'In a large pan or wok, heat oil over medium heat. Add sliced carrots, bell peppers, broccoli, and onions. Stir-fry for 5-7 minutes until vegetables are tender but still crisp. Add soy sauce and cook for another 2 minutes. Serve over rice or noodles.', 25, 4, 'uploads/TomatoSoup.webp'),
(13, 'Eggplant Parmesan', 'Cook pasta according to package instructions. In a pan, heat olive oil over medium heat and cook shrimp until pink. Remove shrimp and set aside. In the same pan, melt butter and sauté garlic for 1 minute. Add lemon juice, white wine, and parsley. Return shrimp to the pan, toss to coat, and simmer for 5 minutes. Serve over pasta and garnish with parmesan cheese.', 50, 4, 'uploads/EggplantParmesan.jpg'),
(16, 'Butter Chicken', 'In a pan, brown beef slices over medium heat and set aside. In the same pan, stir-fry broccoli for 3-4 minutes until tender-crisp. Add beef back to the pan with soy sauce, ginger, and garlic. Simmer for 5 minutes. Serve over rice.', 50, 4, 'uploads/ButterChicken.jpg'),
(17, 'Garlic Bread', 'In a bowl, whisk together flour, baking powder, sugar, salt, and milk. Add eggs and melted butter, stirring until smooth. Heat a nonstick pan over medium heat and pour in a small amount of batter. Cook until bubbles form, then flip and cook until golden brown. Serve with maple syrup and fresh fruit.', 15, 4, 'uploads/GarlicBread.jpg'),
(18, 'Chicken Tikka', 'Heat olive oil in a pan over medium heat and cook sausage until browned. Remove and set aside. In the same pan, cook sliced bell peppers and onions for 5-7 minutes until softened. Return sausage to the pan and simmer for 10 minutes. Serve with crusty bread or over pasta.', 45, 4, 'uploads/ChickenTikka.webp'),
(19, 'French Toast', 'Slice fresh tomatoes and mozzarella into thick rounds. Arrange on a plate with fresh basil leaves. Drizzle with olive oil, balsamic vinegar, and season with salt and pepper. Serve immediately.', 20, 2, 'uploads/FrenchToast.jpg'),
(20, 'Lasagna', 'Slice chicken breasts into strips and marinate with lime juice, garlic, cumin, chili powder, and olive oil for at least 30 minutes. Heat a pan over medium-high heat and cook the chicken until browned. Remove from the pan and set aside. In the same pan, cook sliced bell peppers and onions for 5-7 minutes. Serve the chicken and vegetables in warm tortillas with salsa, sour cream, and guacamole.', 90, 6, 'uploads/Lasagna.jpg'),
(21, 'Apple Pie', 'Bake apple filling in crust.', 60, 8, 'uploads/ApplePie.jpg'),
(22, 'Chili Con Carne', 'Simmer beef, beans, and spices.', 60, 5, 'uploads/ChiliConCarne.jpg'),
(23, 'Shrimp Scampi', 'Sauté shrimp with garlic and lemon.', 20, 3, 'uploads/ShrimpScampi.jpg'),
(24, 'Chicken Noodle Soup', 'Simmer chicken and noodles.', 45, 4, 'uploads/ChickenNoodleSoup.jpg'),
(25, 'Mashed Potatoes', 'Boil and mash potatoes.', 25, 4, 'uploads/MashedPotatoes.webp'),
(26, 'Sushi Rolls', 'Roll rice, seaweed, and fish.', 45, 2, 'uploads/SushiRolls.jpg'),
(27, 'Beef Tacos', 'Cook beef and fill tortillas.', 30, 4, 'uploads/BeefTacos.jpg'),
(28, 'Pad Thai', 'Stir fry noodles with sauce and vegetables.', 30, 3, 'uploads/PadThai.jpg'),
(29, 'Chicken Fried Rice', 'Stir fry rice with chicken.', 25, 4, 'uploads/ChickenFriedRice.jpg'),
(30, 'Meatloaf', 'Mix meat and bake.', 60, 6, 'uploads/Meatloaf.jpg'),
(31, 'Mac and Cheese', 'Boil pasta and mix with cheese sauce.', 30, 4, 'uploads/MacAndCheese.avif'),
(32, 'Vegetable Curry', 'Simmer vegetables in curry sauce.', 40, 4, 'uploads/VegetableCurry.jpg'),
(33, 'Beef Stroganoff', 'Simmer beef in creamy sauce.', 35, 4, 'uploads/BeefStroganoff.jpg'),
(34, 'Caprese Salad', 'Layer tomatoes, mozzarella, and basil.', 10, 2, 'uploads/CapreseSalad.jpg'),
(35, 'Chicken Caesar Wrap', 'Wrap chicken with lettuce and dressing.', 20, 2, 'uploads/ChickenCaesarWrap.jpg'),
(36, 'Blueberry Muffins', 'Mix batter and bake.', 40, 6, 'uploads/BlueberryMuffins.jpg'),
(37, 'Chicken Quesadillas', 'Grill tortillas with cheese and chicken.', 25, 3, 'uploads/ChickenQuesadillas.jpg'),
(38, 'Veggie Burger', 'Grill patty and add toppings.', 20, 2, 'uploads/VeggieBurger.jpg'),
(39, 'BBQ Ribs', 'Grill ribs with BBQ sauce.', 120, 4, 'uploads/BBQRibs.jpg'),
(40, 'Pesto Pasta', 'Mix pasta with pesto sauce.', 20, 3, 'uploads/PestoPasta.jpg'),
(41, 'Pumpkin Soup', 'Simmer pumpkin with spices.', 30, 4, 'uploads/PumpkinSoup.jpg'),
(42, 'Garlic Butter Shrimp', 'Sauté shrimp with garlic butter.', 20, 3, 'uploads/GarlicButterShrimp.jpg'),
(43, 'Fried Rice', 'Stir fry rice with soy sauce.', 25, 4, 'uploads/FriedRice.jpg'),
(44, 'Pulled Pork Sandwich', 'Slow cook pork and serve in buns.', 240, 6, 'uploads/PulledPorkSandwich.jpg'),
(45, 'Chicken Satay', 'Grill chicken skewers with peanut sauce.', 40, 4, 'uploads/ChickenSatay.jpg'),
(46, 'Lemon Herb Chicken', 'Bake chicken with lemon and herbs.', 45, 4, 'uploads/LemonHerbChicken.jpg'),
(47, 'Avocado Toast', 'Toast bread and top with avocado.', 10, 1, 'uploads/AvocadoToast.jpg'),
(48, 'Cheesecake', 'Bake and chill creamy cheesecake.', 180, 8, 'uploads/Cheesecake.jpg'),
(49, 'Clam Chowder', 'Simmer clams with potatoes.', 45, 4, 'uploads/ClamChowder.jpg'),
(50, 'Beef Kebabs', 'Grill beef skewers.', 30, 4, 'uploads/BeefKebabs.jpg'),
(51, 'Butter Garlic Naan', 'Bake naan with butter and garlic.', 20, 4, 'uploads/ButterGarlicNaan.jpg'),
(52, 'Chicken Shawarma', 'Grill marinated chicken with spices.', 50, 4, 'uploads/ChickenShawarma.jpg'),
(53, 'Fish and Chips', 'Fry fish and serve with fries.', 40, 4, 'uploads/FishAndChips.jpg'),
(54, 'Lamb Curry', 'Simmer lamb with curry spices.', 70, 4, 'uploads/LambCurry.jpg'),
(55, 'Churros', 'Fry dough and coat with sugar.', 40, 6, 'uploads/Churros.jpg'),
(56, 'Stuffed Bell Peppers', 'Stuff peppers with rice and meat, then bake.', 50, 4, 'uploads/StuffedBellPeppers.jpg'),
(57, 'Chicken Parmesan', 'Bread chicken, fry, and bake with marinara sauce.', 60, 4, 'uploads/ChickenParmesan.jpg'),
(58, 'Ceviche', 'Marinate fish in lime and seasonings.', 20, 3, 'uploads/Ceviche.jpg'),
(59, 'Cornbread', 'Mix ingredients and bake.', 40, 6, 'uploads/Cornbread.jpg'),
(60, 'Tiramisu', 'Layer coffee-soaked cake with mascarpone cream.', 60, 8, 'uploads/Tiramisu.jpg'),
(61, 'Pork Schnitzel', 'Bread and fry pork cutlets.', 40, 4, 'uploads/PorkSchnitzel.jpg'),
(62, 'Falafel', 'Fry chickpea balls and serve with pita.', 50, 4, 'uploads/Falafel.jpg'),
(63, 'Tom Yum Soup', 'Simmer shrimp with herbs and spices.', 30, 4, 'uploads/TomYumSoup.jpg'),
(64, 'Bangers and Mash', 'Serve sausages with mashed potatoes.', 40, 4, 'uploads/BangersAndMash.jpg'),
(65, 'Egg Salad', 'Mix boiled eggs with mayo and mustard.', 15, 2, 'uploads/EggSalad.jpg'),
(66, 'Crispy Tofu', 'Fry tofu cubes with soy sauce.', 25, 3, 'uploads/CrispyTofu.jpg'),
(67, 'Pork Ribs', 'Bake ribs with spices and BBQ sauce.', 120, 6, 'uploads/PorkRibs.jpg'),
(68, 'Sausage Rolls', 'Wrap sausages in puff pastry and bake.', 40, 4, 'uploads/SausageRolls.jpg'),
(69, 'Moussaka', 'Layer eggplant, beef, and béchamel sauce, then bake.', 90, 6, 'uploads/Moussaka.jpg'),
(70, 'Chia Pudding', 'Mix chia seeds with milk and refrigerate overnight.', 10, 2, 'uploads/ChiaPudding.jpg'),
(71, 'Lentil Soup', 'Simmer lentils with vegetables and broth.', 45, 4, 'uploads/LentilSoup.jpg'),
(72, 'Chili Dogs', 'Top hot dogs with chili and cheese.', 20, 4, 'uploads/ChiliDogs.jpg'),
(73, 'Beef Empanadas', 'Fill dough with beef and bake.', 60, 6, 'uploads/BeefEmpanadas.jpg'),
(74, 'Pineapple Fried Rice', 'Stir fry rice with pineapple and vegetables.', 25, 4, 'uploads/PineappleFriedRice.jpg'),
(75, 'Coconut Curry', 'Simmer coconut milk with curry paste and vegetables.', 45, 4, 'uploads/CoconutCurry.jpg'),
(76, 'Ratatouille', 'Simmer vegetables with tomato sauce.', 60, 4, 'uploads/Ratatouille.jpg'),
(77, 'Kebabs', 'Skewer and grill meat with vegetables.', 35, 4, 'uploads/Kebabs.jpg'),
(78, 'Baked Ziti', 'Bake ziti pasta with marinara and cheese.', 45, 4, 'uploads/BakedZiti.jpg'),
(79, 'Pasta Primavera', 'Toss pasta with sautéed vegetables and sauce.', 30, 4, 'uploads/PastaPrimavera.jpg'),
(80, 'Risotto Milanese', 'Cook risotto with saffron and broth.', 50, 4, 'uploads/RisottoMilanese.jpg'),
(81, 'Coconut Shrimp', 'Fry shrimp in coconut batter.', 30, 4, 'uploads/CoconutShrimp.jpg'),
(82, 'Margarita Pizza', 'Top pizza dough with tomato and mozzarella, then bake.', 40, 4, 'uploads/MargaritaPizza.jpg'),
(83, 'Lobster Roll', 'Fill bun with lobster salad.', 20, 2, 'uploads/LobsterRoll.jpg'),
(84, 'Pumpkin Pie', 'Bake spiced pumpkin filling in pie crust.', 60, 8, 'uploads/PumpkinPie.jpg'),
(85, 'Barbecue Chicken', 'Grill chicken with barbecue sauce.', 45, 4, 'uploads/BarbecueChicken.jpg'),
(86, 'Ramen', 'Boil noodles and add broth and toppings.', 30, 4, 'uploads/Ramen.jpg'),
(87, 'Beef Wellington', 'Wrap beef in puff pastry and bake.', 120, 6, 'uploads/BeefWellington.jpg'),
(88, 'Roast Duck', 'Roast duck with seasoning and glaze.', 90, 4, 'uploads/RoastDuck.jpg'),
(89, 'Eggplant Stir Fry', 'Stir fry eggplant with garlic and soy sauce.', 25, 3, 'uploads/EggplantStirFry.jpg'),
(90, 'Goulash', 'Simmer beef and vegetables with paprika.', 60, 5, 'uploads/Goulash.jpg'),
(91, 'Tofu Stir Fry', 'Stir fry tofu with vegetables and sauce.', 30, 4, 'uploads/TofuStirFry.jpg'),
(92, 'Salmon Fillet', 'Bake salmon with lemon and herbs.', 30, 4, 'uploads/SalmonFillet.jpg'),
(93, 'Pork Belly', 'Roast pork belly with seasoning.', 90, 4, 'uploads/PorkBelly.jpg'),
(94, 'Fried Chicken', 'Coat chicken in flour and fry.', 50, 4, 'uploads/FriedChicken.jpg'),
(95, 'BBQ Chicken Wings', 'Grill chicken wings with BBQ sauce.', 45, 4, 'uploads/BBQChickenWings.jpg'),
(96, 'Lobster Bisque', 'Simmer lobster with cream and broth.', 60, 4, 'uploads/LobsterBisque.jpg'),
(97, 'Steak Frites', 'Grill steak and serve with fries.', 45, 4, 'uploads/SteakFrites.jpg'),
(98, 'Vegetable Paella', 'Cook rice with vegetables and spices.', 50, 4, 'uploads/VegetablePaella.jpg'),
(99, 'Chicken Enchiladas', 'Roll chicken in tortillas and bake with sauce.', 60, 4, 'uploads/ChickenEnchiladas.jpg'),
(100, 'Samosas', 'Fill dough with spiced potatoes and fry.', 60, 6, 'uploads/Samosas.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `first` varchar(25) DEFAULT NULL,
  `last` varchar(25) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `active` enum('Yes','No') NOT NULL DEFAULT 'Yes',
  `dateAdded` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first`, `last`, `email`, `password`, `active`, `dateAdded`) VALUES
(1, 'sarrah', 'gandhi', 'thesarrahgandhi@gmail.com', 'd916b8aefcb6c41a645ecce6c6890c91', 'Yes', '2025-03-27 22:25:27'),
(2, 'Murtaza', 'Saifuddin', 'mortuze@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 'Yes', '2025-03-27 23:05:24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Ingredients`
--
ALTER TABLE `Ingredients`
  ADD PRIMARY KEY (`IngredientID`),
  ADD KEY `RecipeID` (`RecipeID`);

--
-- Indexes for table `Recipes`
--
ALTER TABLE `Recipes`
  ADD PRIMARY KEY (`RecipeID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Ingredients`
--
ALTER TABLE `Ingredients`
  MODIFY `IngredientID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=301;

--
-- AUTO_INCREMENT for table `Recipes`
--
ALTER TABLE `Recipes`
  MODIFY `RecipeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=171;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Ingredients`
--
ALTER TABLE `Ingredients`
  ADD CONSTRAINT `ingredients_ibfk_1` FOREIGN KEY (`RecipeID`) REFERENCES `Recipes` (`RecipeID`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
