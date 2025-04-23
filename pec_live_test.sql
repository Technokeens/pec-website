-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 23, 2025 at 08:36 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pec_live_test`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `first_name` varchar(250) NOT NULL,
  `last_name` varchar(250) NOT NULL,
  `user_name` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `profile_image` longtext CHARACTER SET ascii COLLATE ascii_bin NOT NULL,
  `registration_date` datetime NOT NULL,
  `user_type` enum('admin','technician','agent') DEFAULT NULL,
  `last_login` datetime NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `first_name`, `last_name`, `user_name`, `password`, `profile_image`, `registration_date`, `user_type`, `last_login`, `status`) VALUES
(1, 'Mr', 'Admin', 'admin@demo.com', 'e10adc3949ba59abbe56e057f20f883e', '1714044626_peclogo.png', '2017-05-31 12:14:39', 'admin', '2024-09-02 13:00:32', '1');

-- --------------------------------------------------------

--
-- Table structure for table `social`
--

CREATE TABLE `social` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `facebook` varchar(250) NOT NULL,
  `twitter` varchar(250) NOT NULL,
  `linkedin` varchar(250) NOT NULL,
  `googleplus` varchar(250) NOT NULL,
  `instagram` varchar(250) NOT NULL,
  `youtube` varchar(250) NOT NULL,
  `pinterest` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `social`
--

INSERT INTO `social` (`id`, `user_id`, `facebook`, `twitter`, `linkedin`, `googleplus`, `instagram`, `youtube`, `pinterest`) VALUES
(1, 1, '', 'https://twitter.com/login', '', 'https://plus.google.com/', 'https://www.instagram.com/?hl=en', '', 'https://in.pinterest.com/');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_activation`
--

CREATE TABLE `tbl_activation` (
  `aid` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `key` varchar(255) NOT NULL,
  `status` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_application`
--

CREATE TABLE `tbl_application` (
  `t_id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `position` int(11) NOT NULL,
  `show_as_home` varchar(255) NOT NULL,
  `short_description` text NOT NULL,
  `description` text NOT NULL,
  `slug` varchar(250) NOT NULL,
  `application_image` varchar(250) NOT NULL,
  `application_icon_white` varchar(255) NOT NULL,
  `banner_image` varchar(250) NOT NULL,
  `seo_title` varchar(250) NOT NULL,
  `seo_description` text NOT NULL,
  `seo_keywords` varchar(250) NOT NULL,
  `status` enum('1','0') NOT NULL,
  `created_on` datetime NOT NULL,
  `delete_status` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_application`
--

INSERT INTO `tbl_application` (`t_id`, `title`, `position`, `show_as_home`, `short_description`, `description`, `slug`, `application_image`, `application_icon_white`, `banner_image`, `seo_title`, `seo_description`, `seo_keywords`, `status`, `created_on`, `delete_status`) VALUES
(1, 'Automotive', 1, 'on', 'Automotive manufacturers have steadily increased the electronic content in their products to improve functionality, provide entertainment, increase safety and meet regulatory requirements.', '<p>Automotive manufacturers have steadily increased the electronic content in their products to improve functionality, provide entertainment, increase safety and meet regulatory requirements.</p>\r\n\r\n<p>PEC has resistors for different automotive applications like Blower Motor Speed Control, Radiator Motor step down speed, EMI Suppression in spark plugs and spark plug caps, and current sensing in various car systems like wipers, automatic windows, engine control units, battery management systems & electronic power steering.</p>\r\n\r\n<p>In almost all automotive applications the resistor has to be customised to meet the space and functional requirements of the system and PEC has been adept at engineering customised products at affordable prices.</p>\r\n', '1-automotive', '1720172466_Automotive.png', '1720172466_Automotive.png', '1720009347.jpg', 'Automotive', 'Automotive', 'Automotive', '1', '2024-07-08 13:45:37', '0'),
(2, 'Renewable Energy', 2, 'on', 'The massive emissions of Greenhouse gases over the last two centuries have set into motion environmental changes leading to global warming with catastrophic impact on plant, animal and human life in the 21st century.', '<p>The massive emissions of Greenhouse gases over the last two centuries have set into motion environmental changes leading to global warming with catastrophic impact on plant, animal and human life in the 21st century.</p>\r\n\r\n<p>There is a global imperative to cut carbon and greenhouse gas emissions from traditional power plants by shifting power production to more renewable sources like Solar, Wind, Hydro, Tidal, Biomass & Geothermal.</p>\r\n\r\n<p>All these systems need high tech electronic equipment to capture, convert, transform and transmit power to the end users.</p>\r\n\r\n<p>We have a range of resistor technologies which can be used in electronic equipment like inverters, converters, transformers, control systems to test, regulate, condition, monitor & protect systems.</p>\r\n', '2-renewable-energy', '1720174495_Renewable_Energy.png', '1720174495_Renewable_Energy.png', '1720617516.jpg', 'Renewable Energy', 'Renewable Energy', 'Renewable Energy', '1', '2024-07-10 18:48:36', '0'),
(3, 'Home Appliances', 3, 'on', 'Resistors are used in many home appliances like Washing Machines, Dish washer, mixers and grinders, refrigerators & air conditioning for different circuit applications.', '<p>Resistors are used in many home appliances like Washing Machines, Dish washer, mixers and grinders, refrigerators & air conditioning for different circuit applications. They are used in power supplies, current sensing, for circuit protection, ballasts and other electrical functions. There is large choice of resistors which can be used in these equipment and customers can choose the right type of resistor to fit their form, function, application and product reliability desired to optimise the resistor used. PEC offers a range of products across the ohmic value, power rating and design to match the requirement and expectations of the application.</p>\r\n', '3-home-appliances', '1720173716_Home_Appliances.png', '1720173716_Home_Appliances.png', '1720423872.jpg', 'Home Appliances', 'Home Appliances', 'Home Appliances', '1', '2024-07-09 10:10:26', '0'),
(4, 'Military Equipment', 4, 'on', 'Power resistors are found in a multitude of electrical and electronic equipment used by the military and the armed forces.', '<p>Power resistors are found in a multitude of electrical and electronic equipment used by the military and the armed forces. These resistors are subjected to extreme conditions of ambient temperature, humidity and moisture in tropical environments, altitude, salt laden atmosphere.</p>\r\n\r\n<p>To qualify resistors for use in such conditions, we need to meet the onerous requirements of the Joint Services Specifications (JSS) for resistors.</p>\r\n\r\n<p>PEC was the first in the country to qualify wirewound resistors to the JSS 50402 specification back in 1977 and maintained these qualifications for an extended period of time.</p>\r\n\r\n<p>PEC resistors have been used extensively in applications like radars, tanks, power supplies, radio transmission and reception equipment, flight on board equipment, battery chargers over a number of years and are field proven to be highly reliable workhorses of the industry.</p>\r\n\r\n<p>We can provide screened components for applications where absolute confidence is required to ensure that products work to spec when the equipment is needed.</p>\r\n', '4-military-equipment', '1720174169_Military_Wruipment.png', '1720174169_Military_Wruipment.png', '1720617791.jpg', 'Military', 'Military', 'Military', '1', '2024-07-10 18:53:11', '0'),
(5, 'CT & MRI Equipments', 5, 'on', 'Magnetic Resonance Imaging and Computer Tomography machines have a need of specialised resistors which are typically not inductive.', '<p>Magnetic Resonance Imaging and Computer Tomography machines have a need of specialised resistors which are typically not inductive, have high resistance values and are capable to handling high power. We have a range of high mega and giga ohms resistors which can be used for these applications. Enclosed below is a range of products which the equipment designer and sourcing engineers may find useful in quickly locating the right product for their use. Get in touch with us for more details or to cross reference your existing parts with our offerings.</p>\r\n', '5-ct-mri-equipments', '1720175418_CT_MRI_Equipment.png', '1720175418_CT_MRI_Equipment.png', '1720617617.jpg', 'CT & MRI Equipments', 'CT & MRI Equipments', 'CT & MRI Equipments', '1', '2024-07-10 18:50:17', '0'),
(6, 'Exercise Equipments', 6, 'on', 'As the health consciousness has increased across the globe the demand for health related equipment, including exercise equipment has grown manifold.', '<p>As the health consciousness has increased across the globe the demand for health related equipment, including exercise equipment has grown manifold. The Covid-19 pandemic has consigned large populations across the globe to their homes and prevented them from pursing their fitness goals at their nearby fitness gyms. New innovative designs of exercise equipment are driving a huge surge of demand from home bound buyers.</p>\r\n\r\n<p>These equipment demand a high level of sophistication from the components used in the drives which power the treadmills, the cross trainers, elliptical trainers and cycling machines. We have high quality vitreous enamel coated tubular resistors (PVR, PVRC) which are perfect for use in these machines which do not emit any smoke when the braking overload is applied on them. Also available are lower cost silicone coated tubular resistors (PPR, PPRC). They are cost effective resistors which can work in adverse environments where there is 100% humidity & constant exposure to salt mist too.</p>\r\n', '6-exercise-equipments', '1720173589_Exercise_Equipment.png', '1720173589_Exercise_Equipment.png', '1720423856.jpg', 'Exercise Equipments', 'Exercise Equipments', 'Exercise Equipments', '1', '2024-07-09 10:14:57', '0'),
(7, 'Military test', 9, 'on', 'From engine control to safety features, ensure reliability and performance in every vehicle.', '<p>PEC has resistors for different automotive applications like Blower Motor Speed Control, Radiator Motor step down speed, EMI Suppression in spark plugs and spark plug caps, and current sensing in various car systems like wipers, automatic windows, engine control units, battery management systems & electronic power steering.<br>\r\nIn almost all automotive applications the resistor has to be customised to meet the space and functional requirements of the system and PEC has been adept at engineering customised products at affordable prices.</p>\r\n\r\n<p>Talk to us and we will work with you through the design cycle or provide you with an alternate vendor option to meet your volume requirements or to reduce the risk of your supply chain.</p>\r\n', '7-military-test', '1717564541_appicon1.png', '', '1717564541.png', 'Military test', 'Military test', 'Military test', '0', '2024-06-05 10:45:41', '0'),
(8, 'Inrush Current Control', 8, 'off', 'Inrush current, input surge current, or switch-on surge is the maximal instantaneous input current drawn by an electrical device when first turned on.', '<p>Inrush current, input surge current, or switch-on surge is the maximal instantaneous input current drawn by an electrical device when first turned on. Alternating-current electric motors and transformers may draw several times their normal full-load current when first energized, for a few cycles of the input waveform. Power Converters also often have inrush currents much higher than their steady-state currents, due to the charging current of the input capacitance.</p>\r\n\r\n<p>A discharged or partially charged capacitor appears as a short circuit to the source when the source voltage is higher than the potential of the capacitor. A fully discharged capacitor will take approximately 5 RC time cycles to fully charge; during the charging portion of the cycle, instantaneous current can exceed load current by a substantial multiple. Instantaneous current declines to load current as the capacitor reaches full charge.</p>\r\n\r\n<p>In the case of charging a capacitor from a linear DC voltage, like that from a battery, the capacitor will still appear as a short circuit; it will draw current from the source limited only by the internal resistance of the source and ESR of the capacitor. The charging current will be continuous and decline exponentially to the load current. For open circuit, the capacitor will be charged to the DC voltage.</p>\r\n\r\n<p>Safeguarding against the filter capacitor’s charging period’s initial current inrush flow is crucial for the performance of the device. Temporarily introducing a high resistance between the input power and rectifier can increase the resistance of the powerup, leading to reducing the inrush current. Using an inrush current limiter for this purpose helps, as it can provide the initial resistance needed.</p>\r\n\r\n<p>A cost effective way of reducing the inrush current is to place a resistor in series. While choosing the resistor, the designer should be aware of the inrush handling capability of the resistor. Wirewound resistors can be designed for reliable high inrush current handling capability and repeatable performance. The capability of the resistor can be far in excess of its normal rated load and circuits can be optimised in discussion with the resistor manufacturer. Send us details of your inrush current problems for optimised solutions.</p>\r\n', '8-inrush-current-control', '1720172817_Current_Control_1.png', '1720172817_Current_Control_2.png', '1720617754.jpg', 'Inrush Current Control', 'Inrush Current Control', 'Inrush Current Control', '1', '2024-07-10 18:52:34', '0'),
(9, 'Capacitor Charging', 9, 'off', 'Capacitors used in electronic circuits come in all kinds of ratings of capacitance and voltage from small plastic film capacitors to Aluminium electrolytic capacitors to supercapacitors with very high storage capacities. ', '<p>Capacitors used in electronic circuits come in all kinds of ratings of capacitance and voltage from small plastic film capacitors to Aluminium electrolytic capacitors to supercapacitors with very high storage capacities. When a voltage is applied on an uncharged capacitor the circuit will experience a high draw of current by the capacitor as it behaves initially like a short circuit.</p>\r\n\r\n<p>This is called an inrush current and unless this current is controlled to an acceptable level, by placing a resistor in series with the capacitor, it can cause damage to the circuit components and lead to early failure of the equipment. A variety of power resistors can be used to reduce the inrush current peak to manageable levels.</p>\r\n\r\n<p>Practically any of the resistors in our range can be used for this purpose based on the resistance value required, inrush current peak and time period of charging and total energy that the resistor must absorb during charging. Small capacitors mounted on PCB’s and small electrolytic capacitors can be charged using small board mountable axial resistors.</p>\r\n\r\n<p>About 250 Joules of inrush energy can be handled by smaller resistors on PCB’s. Higher inrush energy would need larger resistors from the PPR, PVR, PVRC resistors ranges. Alternatively there is a whole family of Aluminium Housed Resistors like the PHA, PHF, PHCF, PHBH, PHCH, PHEF, PHBR types which could be used depending on the size of the capacitor being charged.</p>\r\n', '9-capacitor-charging', '1720172573_Capacitor_Charging.png', '1720172573_Capacitor_Charging.png', '1720422479.jpg', 'Capacitor charging', 'Capacitor charging', 'Capacitor charging', '1', '2024-07-09 10:16:35', '0'),
(10, 'Capacitor Discharge', 9, 'off', 'Small capacitance HV capacitors can be discharged through high ohmic value resistors of the PTE and PUT type. These resistors, which are designed to handle high voltage for extended durations.', '<p>Small capacitance HV capacitors can be discharged through high ohmic value resistors of the PTE and PUT type. These resistors, which are designed to handle high voltage for extended durations, can be used to safely discharge the high voltage stored in the capacitors to acceptable voltage levels when the systems are switched off or need reducing for any reason. The PUT and the higher power PTE type resistors can also be used for inrush control in the HV capacitor charging circuits as needed by the circuit designers. In some applications the resistors are immersed in oil tanks to keep them cool and to ensure that there are no corona discharges around them.</p>\r\n', '10-capacitor-discharge', '1720172605_Capacitor_Discharge.png', '1720172605_Capacitor_Discharge.png', '1720617579.jpg', 'Capacitor Discharge', 'Capacitor Discharge', 'Capacitor Discharge', '1', '2024-07-10 18:49:39', '0'),
(11, 'Motor Drives', 10, 'off', 'Motors are one of the most significant consumers of power generated across the world.', '<p>Motors are one of the most significant consumers of power generated across the world. Any reduction in the power consumed by motors helps in reduction of global greenhouse emissions, lowers electricity budgets and makes the world a more sustainable place.</p>\r\n\r\n<p>New applications for motors are being constantly added and so is the evolution of new drive technologies which help reduce the startup current in AC motors and provide optimum motor speed to deliver the right efficiencies.</p>\r\n\r\n<p>PEC has a range of highly developed resistors for optimum performance in motor drives. We have specialised resistors for inrush current control, current sensing, UL approved braking resistors for discharge of high voltage when motors need to quickly reduce speed or come to a halt, crowbar resistors for large motor drives and a new range of PTC element braking resistors for small drives.</p>\r\n\r\n<p>Why not talk to us about your drive design requirements and we will provide you with optimum designs which will not only reduce your space budgets, give you high reliability long life resistors and help reduce overall costs.</p>\r\n', '11-motor-drives', '1720174261_Motor_Drive.png', '1720174261_Motor_Drive.png', '1720424067.jpg', 'Motor Drives', 'Motor Drives', 'Motor Drives', '1', '2024-07-09 10:19:23', '0'),
(12, 'Dynamic Braking', 12, 'off', 'Dynamic braking resistors are used in electrical drives to absorb the energy generated by the motor during a deceleration phase when the voltage in the DC Bus goes beyond a set point.', '<p>Dynamic braking resistors are used in electrical drives to absorb the energy generated by the motor during a deceleration phase when the voltage in the DC Bus goes beyond a set point.</p>\r\n\r\n<p>Braking resistors are the simplest and most reliable way of absorbing this energy and preventing the drive electronics from tripping in order to protect itself during this phase. In most cases the braking resistor solution is also the most cost effective way of absorbing this high energy.</p>\r\n\r\n<p>Braking resistors have to be specially designed to absorb these high overloads and the amount of energy that can be absorbed depends on the duty cycle of the motor system.</p>\r\n\r\n<p>PEC provides a range of resistors which can be used in servo systems, robotic drive systems, variable frequency drives which have the UL safety mark and high overload capability.</p>\r\n\r\n<p>We have different types of braking resistors in our range. We offer traditional Ceramic Resistors with Vitreous Enamel Coating (PVR, PVRC), Silicone Cement Coating (PPR, PPRC) and a Range of Aluminium Housed Resistors (PHF, PHCF, PHBH, PHCH, PHEF, PHBR) for fully enclosed insulated resistors. For small motor drives we also have a compact range of PTC element braking resistors – our PHPTC series.</p>\r\n\r\n<p>For traction drives used in electric locomotives we have custom designed soft crowbar resistors to absorb high energy overload pulses available in well designed stainless steel enclosures.</p>\r\n', '12-dynamic-braking', '1720172961_Dynamic_Braking.png', '1720172961_Dynamic_Braking.png', '1720617669.jpg', 'Dynamic Braking', 'Dynamic Braking', 'Dynamic Braking', '1', '2024-07-10 18:51:09', '0'),
(13, 'Traction Resistors', 13, 'off', 'Railway technology has experienced perpetual development over the 100 years and for the last 40 of those years, we have worked with designers and manufacturers to provide a wide range of resistor solutions for traction use.', '<p>Railway technology has experienced perpetual development over the 100 years and for the last 40 of those years, we have worked with designers and manufacturers to provide a wide range of resistor solutions for traction use.</p>\r\n\r\n<p>Today, Diesel Engines, Electric Engines, EMU’s, Metro and Freight Trains are the back bone of the world’s rail network. Over different locos we have a proud supply history of precharge resistors, discharge resistors, soft crowbar resistors, resistors for lighting controls, resistors for auxiliary converters, for display controls, signalling systems & traction control cabinets. Many of these resistors were and are modified to meet customer’s demand for size, voltage, impulse loads, inrush loads and overvoltage conditions. Get in touch today. We will have a solution for your problem and in the rare case that we don’t, we will cheerfully engineer or customise a specific answer at minimal cost. NOW, that’s the answer, What’s the question?</p>\r\n', '13-traction-resistors', '1720174641_Traction_Resistance.png', '1720174641_Traction_Resistance.png', '1720617549.jpg', 'Traction Resistors', 'Traction Resistors', 'Traction Resistors', '1', '2024-07-10 18:49:09', '0'),
(14, 'Power switchgear', 14, 'off', 'The process of transmission of electricity safely from the generating station to the end user has multiple protection systems built in with switchgears located at each stage of the transmission network.', '<p>The process of transmission of electricity safely from the generating station to the end user has multiple protection systems built in with switchgears located at each stage of the transmission network.</p>\r\n\r\n<p>These switchgears have supervision systems to monitor their performance and to provide fail safe operation they need to be highly reliable to quickly localise faults which occur in the network and to isolate parts of the network which might malfunction.</p>\r\n\r\n<p>There are protection relays, auxiliary relays, trip circuit supervision relays which are used widely across any electricity transmission network.</p>\r\n\r\n<p>Our resistors have been used extensively across the world in these protection relays, both numerical and electromechanical to provide highly reliable switching systems.</p>\r\n\r\n<p>We have a range of products from low power resistors to high power resistors suitable for use in these electrical network equipment which will meet the demands of high reliability and long life as needed by these systems.</p>\r\n', '14-power-switchgear', '1720174439_Power_Switchgear_2.png', '1720174439_Power_Switchgear_3.png', '1720424118.jpg', 'Power switchgear', 'Power switchgear', 'Power switchgear', '1', '2024-07-08 13:05:18', '0'),
(15, 'Oil and Gas Equipment', 15, 'off', 'The Oil and Gas sector requires highly reliable equipment which can work for long durations in adverse environmental conditions.', '<p>The Oil and Gas sector requires highly reliable equipment which can work for long durations in adverse environmental conditions like exposure to high humidity, high temperatures, salt laden air and remote working locations where maintenance support is limited.</p>\r\n\r\n<p>Resistors used in such equipment have to meet stringent requirements which can degrade even well designed products for normal industrial use.</p>\r\n\r\n<p>We have years of experience in selecting the right materials, coatings, production processes to provide highly reliable resistors which can be used in welders, drives and instrumentation used in this sector.</p>\r\n\r\n<p>Highly reliable glass enamel coated resistors can be incredibly long lasting in Inrush Current reduction while charging large capacitors used in the welders.</p>\r\n\r\n<p>Cement resistors specially designed to pass long duration salt spray testing can enhance the life of PCBs in welding control circuits.</p>\r\n', '15-oil-and-gas-equipment', '1720174306_Oil_gas_1.png', '1720174306_Oil_gas_2.png', '1720617809.jpg', 'Oil and Gas Equipment', 'Oil and Gas Equipment', 'Oil and Gas Equipment', '1', '2024-07-10 18:53:29', '0'),
(16, 'UPS and Inverters', 15, 'off', 'As acknowledged experts, we have a long and successful track record in supplying resistors targeted at the uninterruptible power supplies (UPS) and inverter markets.', '<p>As acknowledged experts, we have a long and successful track record in supplying resistors targeted at the uninterruptible power supplies (UPS) and inverter markets.</p>\r\n\r\n<p>Whilst the personal computer kicked off global growth in UPS, Internet and Cloud servers have expanded mission critical positions in data centres across the globe, establishments that consume huge amounts of energy, in storing critical data for millions of businesses.</p>\r\n\r\n<p>Uninterrupted Power Supply is critical here for operational support.</p>\r\n\r\n<p>Our PEC quality power resistors combine longevity, with high reliability, with modest cost and cover a large range from PCB mount through tubular to large aluminium clad devices.</p>\r\n\r\n<p>We have supported UPS products from a hundred kilowatts to many megawatts. Most are used for inrush protection, precharge in voltage balancing, and current sensing.</p>\r\n', '16-ups-and-inverters', '1720174669_UPS_1.png', '1720174669_UPS_2.png', '1720617561.jpg', 'UPS and Inverters', 'UPS and Inverters', 'UPS and Inverters', '1', '2024-07-10 18:49:21', '0'),
(17, 'Instrument Transformers', 17, 'off', 'Modern instruments use a large range of resistors for various applications from small pull up resistors, to power resistors in their power supplies, to highly accurate resistors in measuring circuits', '<p>Modern instruments use a large range of resistors for various applications from small pull up resistors, to power resistors in their power supplies, to highly accurate resistors in measuring circuits. A whole range of applications are supported by a vast variety of resistors supplied by the resistor industry. A small ensemble of PEC resistors has been included below for quick reference of the users. Depending on application requirements the designer can browse through the entire range of PEC resistors to decide which works best in their applications. In case of any questions or application advise, please feel free to write to us or get in touch through any channel.</p>\r\n', '17-instrument-transformers', '1720173891_Instrument_Transformer_1.png', '1720173960_Instrument_Transformer_2.png', '1720423981.jpg', 'Instrument Transformers', 'Instrument Transformers', 'Instrument Transformers', '1', '2024-07-08 13:03:01', '0'),
(18, 'Telecom', 18, 'off', 'Power resistors are used across the telecom sector for many applications ranging from wired telephone networks, Power supplies for Mobile telephony etc', '<p>Power resistors are used across the telecom sector for many applications ranging from wired telephone networks, Power supplies for Mobile telephony, Charging circuits in ubiquitous mobile phone chargers, Protection of Internet Routers and Wifi base stations. Wirewound resistors are used in inrush protection circuits in large power supplies and in smaller charger circuits too.</p>\r\n\r\n<p>The size of the resistor can range from large high power and high current absorbing parts to low wattage but high surge resistant designs for protecting low current power supplies. Specially designed resistors have been used for board level lightning protection in large telecom networks. These resistors are custom designed to absorb large current surges for considerable duration and also for short high voltage pulses from the typical IEC specified test specifications in IEC 61000-4-5 document. We have a whole range of resistors which can be used in your telecom application.</p>\r\n', '18-telecom', '1720174553_Telecom_2_1.png', '1720174553_Telecom_2_2.png', '1720424199.jpg', 'Telecom', 'Telecom', 'Telecom', '1', '2024-07-08 13:06:39', '0'),
(19, 'Power Supplies', 19, 'off', 'Any electrical equipment from the simplest of toys, household white goods, machinery and the most sophisticated computer system requires an appropriate power supply to provide it clean power for functioning.', '<p>Any electrical equipment from the simplest of toys, household white goods, machinery and the most sophisticated computer system requires an appropriate power supply to provide it clean power for functioning.</p>\r\n\r\n<p>Most power supplies use a range of components to condition the input power received from the grid to deliver the right voltage, current and power level needed. For higher power equipment, power resistors are used for many functions like inrush suppression, bleeders, crowbar protection, dummy loads etc.</p>\r\n\r\n<p>The range of resistors used to make power supplies is vast and the choice of the designer depends on many factors. Almost all the resistors from our extensive range can be used in some power supply application.</p>\r\n\r\n<p>A cross section of our resistors are included in the list given below which can be considered for use in power supplies.</p>\r\n', '19-power-supplies', '1720174372_Power_supply_1.png', '1720174372_Power_supply_2.png', '1720424100.jpg', 'Power Supplies', 'Power Supplies', 'Power Supplies', '1', '2024-07-08 13:05:00', '0'),
(20, 'Anti condensation heaters', 20, 'off', 'High Humidity is the bane of electronic equipment as condensation of moisture leads to lowering of insulation resistance', '<p>High Humidity is the bane of electronic equipment as condensation of moisture leads to lowering of insulation resistance, development of shorting paths in equipment, corrosion of metal parts of components and eventually early failure of products.</p>\r\n\r\n<p>Cabinets which house electronic equipment need to include condensation heaters which help in maintaining a higher ambient temperature to reduce relative humidity and prevent condensation. In some optical equipment condensation has to be prevented as it will interfere with the basic functioning and here localised heating is very effective in eliminating condensation.</p>\r\n\r\n<p>We have highly reliable UL-approved Air Heaters which can provide 250W/400W of heating power to deliver heated air in control cabinets and a range of static resistors which can provide customised heating solutions for local area-controlled heating.</p>\r\n\r\n<p>Resistors are basically heaters which are designed for long life and very reliable performance which can be considered for use in applications where these parameters are critical and standard heater solutions don’t meet the requirements.</p>\r\n\r\n<p>Aluminium housed resistors like our PHA series, PHCF series can use fixed on available housing surfaces in any equipment to provide conductive heating. Small resistors like PVA series can be used in security cameras to ward off condensation on lenses and camera housing.</p>\r\n', '20-anti-condensation-heaters', '1720172150_Anti_Condensation_1.png', '1720172150_Anti_Condensation_2.png', '1720422410.jpg', 'Anti condensation heaters', 'Anti condensation heaters', 'Anti condensation heaters', '1', '2024-07-08 12:36:50', '0'),
(21, 'Security Cameras', 21, 'off', 'CCTV and security cameras are an integral part of building, office, business and home security today.', '<p>CCTV and security cameras are an integral part of building, office, business and home security today. High end outdoor cameras have to deal with varying environmental conditions and face temperature, humidity, moisture, condensation issues.</p>\r\n\r\n<p>Outdoor cameras are exposed to a variety of weather conditions and need to provide clear and consistent quality of images throughout the year.</p>\r\n\r\n<p>To increase the life of the camera, designers have found that the addition of small precision heaters can go a long way in reducing component failures and improving image quality.</p>\r\n\r\n<p>PEC provides small size resistors which are ideally suited to work as heaters in these cameras.</p>\r\n', '21-security-cameras', '1720172532_Camera_1.png', '1720172532_Camera_2.png', '1720424169.jpg', 'Security Cameras', 'Security Cameras', 'Security Cameras', '1', '2024-07-08 13:06:09', '0'),
(22, 'LED Power Supplies', 22, 'off', 'LED power supplies come in a vast range of voltage and current ratings to power LED’s required for various applications. ', '<p>LED power supplies come in a vast range of voltage and current ratings to power LED’s required for various applications. Resistors are commonly used in these power supplies to limit the current and ensure that the LED’s are powered only to their voltage and current limits. This ensure long life and high performance of LED’s.</p>\r\n\r\n<p>Silicone coated resistors are commonly used in LED power supply applications. In case of high-power LED supplies used for industrial lighting and field lighting, higher power aluminium housed resistors from our PHA range can be considered for use. In case current monitoring is desired then the users can consider using current sensing resistors from the PEC range.</p>\r\n', '22-led-power-supplies', '1720174017_LED_Supplt.png', '1720174017_LED_Supplt.png', '1720424014.jpg', 'LED Power Supplies', 'LED Power Supplies', 'LED Power Supplies', '1', '2024-07-08 13:03:34', '0'),
(23, 'Energy Metering', 56, 'off', 'Over the last three decades there has been a global move to first replace mechanical energy meters with accurate electronic meters.', '<p>Over the last three decades there has been a global move to first replace mechanical energy meters with accurate electronic meters, then to multifunction meters and now to smart meters with functions including prepaid metering, remotely monitoring, meters to support smart grids and smart cities.</p>\r\n\r\n<p>PEC has been in the forefront of development of highly robust resistors to meet the lightning surge test requirements specified by electrical utilities globally. Having worked with the original equipment designers at most of the large electronic meter manufacturers PEC has led the way in developing high voltage withstanding resistors with 6KV, 8KV, 10KV and 12KV to help meters meet the IEC 61000-4-5 global specification.</p>\r\n\r\n<p>Now PEC is leading the way with high end resistors for the smart meters being introduced across South Asia and in Europe. We have resistors from 1Ohm to 10KOhms which can be customised to meet your size and high voltage requirements.</p>\r\n\r\n<p>Innumerable meters working globally are protected with PEC resistors which have reduced meter field failures and helped suppliers meet utility specifications globally.</p>\r\n', '23-energy-metering', '1720173492_Energy_meter_1.png', '1720173492_Energy_meter_2.png', '1720423838.jpg', 'Energy Metering', 'Energy Metering', 'Energy Metering', '1', '2024-07-08 13:00:38', '0'),
(24, 'Mobile Chargers', 56, 'off', 'Mobile charges are one of the most ubiquitous devices today with the meteoric rise of different mobile and wearable devices. ', '<p>Mobile charges are one of the most ubiquitous devices today with the meteoric rise of different mobile and wearable devices. Every day billions of mobile phones and wearable devices need to be charged probably more than once a day.</p>\r\n\r\n<p>These small devices need robust components which are low cost, specially tuned to meet the multiple specifications of performance & safety and supplied in large volumes to support requirements of charger manufacturers.</p>\r\n\r\n<p>PEC works closely with customers to identify all their requirements and provides specifically tuned resistors to meet all their needs.</p>\r\n', '24-mobile-chargers', '1720174197_Mobile_Charge_1.png', '1720174197_Mobile_Charge_2.png', '1720424050.jpg', 'Mobile Chargers', 'Mobile Chargers', 'Mobile Chargers', '1', '2024-07-08 13:04:10', '0'),
(25, 'Lighting ', 25, 'off', 'Lighting ', '<p>Lighting </p>\r\n', '25-lighting', '1720174048_Lighting.png', '1720174048_Lighting.png', '1720010160.jpg', 'Lighting ', 'Lighting ', 'Lighting ', '1', '2024-07-05 15:37:28', '0'),
(26, 'White goods', 26, 'off', 'White goods', '<p>White goods</p>\r\n', '26-white-goods', '1720174699_White_Goods.png', '1720174699_White_Goods.png', '1720424233.jpg', 'White goods', 'White goods', 'White goods', '1', '2024-07-08 13:07:13', '0'),
(27, 'Precision Termination Resistors', 27, 'off', 'Modern automation systems need to convert 4-20mA signals generated by field sensors into voltages ranging from 0 to 5V which can be processed in the automation circuitry.', '<p>Modern automation systems need to convert 4-20mA signals generated by field sensors into voltages ranging from 0 to 5V which can be processed in the automation circuitry.</p>\r\n\r\n<p>PEC resistors are highly accurate in transforming these signals into reliable voltage readings which are acted upon by the automation systems for any desired action. Our resistors provide close tolerance and low temperature co-efficient of resistance (TCR) delivering a precise voltage to the processing system to get the most accurate results from the process control systems.</p>\r\n\r\n<p>Choose from:<br>\r\n– PSP type Resistors from 0.25W to 2W with very low temperature rise<br>\r\n– P2D type Resistors<br>\r\n– PEP type Resistors for high accuracy and stability.</p>\r\n', '27-precision-termination-resistors', '1720174340_Percision_Yermination_Resistors_1.png', '1720174340_Percision_Yermination_Resistors_2.png', '1720617828.jpg', 'Precision Termination Resistors', 'Precision Termination Resistors', 'Precision Termination Resistors', '1', '2024-07-10 18:53:48', '0'),
(28, 'Temperature Sensing', 28, 'off', 'Precision Resistors are commonly used in temperature sensing circuits.', '<p>Precision Resistors are commonly used in temperature sensing circuits. These resistors typically have very precise resistance values and a very close tolerance (+/- 0.1%) with low TCR and are used in reference circuits. PEC provides very stable resistors from its PEP, PSP and P2D types of resistors which can be used in sensing circuits. These are typically of wirewound construction and they are specially processed to ensure long term stability of the resistors and provide high accuracy of measurement for long periods of time for high quality equipment used in Industry, Military, Avionics and many other business sectors.</p>\r\n', '28-temperature-sensing', '1720174584_Temperature_sensor_2_1.png', '1720174584_Temperature_sensor_2_2.png', '1720424217.jpg', 'Temperature Sensing', 'Temperature Sensing', 'Temperature Sensing', '1', '2024-07-08 13:06:57', '0'),
(29, 'Instrumentation', 29, 'off', 'Modern instruments use a large range of resistors for various applications from small pull up resistors, to power resistors in their power supplies', '<p>Modern instruments use a large range of resistors for various applications from small pull up resistors, to power resistors in their power supplies, to highly accurate resistors in measuring circuits. A whole range of applications are supported by a vast variety of resistors supplied by the resistor industry. A small ensemble of PEC resistors has been included below for quick reference of the users. Depending on application requirements the designer can browse through the entire range of PEC resistors to decide which works best in their applications. In case of any questions or application advise, please feel free to write to us or get in touch through any channel.</p>\r\n', '29-instrumentation', '1720173938_Instrumentation.png', '1720173938_Instrumentation.png', '1720423999.jpg', 'Instrumentation', 'Instrumentation', 'Instrumentation', '1', '2024-07-08 13:03:19', '0'),
(30, 'Automated Test Equipment (ATE)', 20, 'off', 'We offer a range of high ohmic value resistors which can be used in Automated Test Equipment. ', '<p>We offer a range of high ohmic value resistors which can be used in Automated Test Equipment. These are typically thick film resistors made by screen printing precious metal blended inks onto high purity ceramic substrates for high stability and long life. They are typically non inductive electrically and can be used for high speed test and comparison purposes. The PUT range offers high power ratings combined with low inductance, highly stable thick film resistors with very high resistance values and close tolerance if required.</p>\r\n', '30-automated-test-equipment-ate', '1720172428_Automated_Test_Equipment.png', '1720172492_Automated_Test_Equipment.png', '1720009402.jpg', 'Automated Test Equipment (ATE)', 'Automated Test Equipment (ATE)', 'Automated Test Equipment (ATE)', '1', '2024-07-05 15:11:32', '0'),
(31, 'High Voltage Dividers', 21, 'off', 'Dividers are used to provide feedback in regulation circuits. In high voltage circuits high ohmic value resistors for measurement. ', '<p>Dividers are used to provide feedback in regulation circuits. In high voltage circuits high ohmic value resistors for measurement. In these applications use of high quality thick film, high ohmic value resistors is critical to ensure accuracy in measurement. These resistors are specially designed using stable thick film inks made with precious metals and screen printed on high purity ceramic rods. These resistors can be supplied as matched pairs to get the required measuring ratio’s for the circuit. Matched pairs address the need for improved accuracy in measuring especially in High Voltage transmissions systems which require accurate power metering for billing purposes.</p>\r\n', '31-high-voltage-dividers', '1720173681_High_Voltage.png', '1720173681_High_Voltage.png', '1720617692.jpg', 'High Voltage Dividers', 'High Voltage Dividers', 'High Voltage Dividers', '1', '2024-07-10 18:51:32', '0'),
(32, 'HV Capacitor Charging and Discharging ', 22, 'off', 'Small capacitance HV capacitors can be discharged through high ohmic value resistors of the PTE and PUT type.', '<p>Small capacitance HV capacitors can be discharged through high ohmic value resistors of the PTE and PUT type. These resistors, which are designed to handle high voltage for extended durations, can be used to safely discharge the high voltage stored in the capacitors to acceptable voltage levels when the systems are switched off or need reducing for any reason. The PUT and the higher power PTE type resistors can also be used for inrush control in the HV capacitor charging circuits as needed by the circuit designers. In some applications the resistors are immersed in oil tanks to keep them cool and to ensure that there are no corona discharges around them.</p>\r\n', '32-hv-capacitor-charging-and-discharging', '1720173858_HV_capacitor_1.png', '1720173858_HV_capacitor_2.png', '1720423888.jpg', 'HV Capacitor Charging and Discharging ', 'HV Capacitor Charging and Discharging ', 'HV Capacitor Charging and Discharging ', '1', '2024-07-09 10:26:27', '0'),
(33, 'Corona Generators', 23, 'off', 'Equipment used to generate corona discharges have to handle high voltages safely and need high quality, high mega ohms, low inductance resistors', '<p>Equipment used to generate corona discharges have to handle high voltages safely and need high quality, high mega ohms, low inductance resistors. We have a range of high voltage thick film resistors which gives the product designer a choice of components and capabilities to choose from. These resistors can be provided in regular spiral design, non inductive style with a range of power ratings, voltage ratings and close resistance tolerances. Look at our wide range and let us know which one suits your requirement best or send us your application parameters for the resistor and let us make suggestions of components which are best suited.</p>\r\n', '33-corona-generators', '1720172643_Corona_generator.png', '1720172643_Corona_generator.png', '1720009649.jpg', ' Corona Generators', ' Corona Generators', ' Corona Generators', '1', '2024-07-09 13:16:39', '0'),
(34, 'Radar', 34, 'off', 'High resistance value and high voltage resistors are used in many applications in Radar Circuity. We provide a range of reliable, thick film resistors which are specially designed and developed over 30 years.', '<p>High resistance value and high voltage resistors are used in many applications in Radar Circuity. We provide a range of reliable, thick film resistors which are specially designed and developed over 30 years. These feature non inductive thick film serpentine tracks with special thick film inks which are very stable over long durations of use, provide low TCR and can be provided in tolerances as close at 0.1% on request. Standard tolerance ranges from 1% to 10?pending on customer requirements. The resistors feature a special contact design for zero contact resistance between the resistive track and the end caps.</p>\r\n', '34-radar', '1720174471_Radar_1.png', '1720174471_Radar_2.png', '1720424151.jpg', 'Radar', 'Radar', 'Radar', '1', '2024-07-08 13:05:51', '0'),
(35, 'Lasers', 35, 'off', 'In laser systems its critical to have ballast resistors to stabilise the discharge and limit the current between the voltage source and the discharge tube. ', '<p>In laser systems its critical to have ballast resistors to stabilise the discharge and limit the current between the voltage source and the discharge tube. Systems which do not have ballast resistors will show flashing or flickering discharge.</p>\r\n\r\n<p>The PTE and PUT ranges of thick film high power resistors gives the user a range of choices from 1W to 50W in high ohmic values. These resistors are specially designed using stable thick film inks made with precious metals and screen printed on high purity ceramic rods.</p>\r\n\r\n<p>Protect your laser systems with high quality thick film resistors which are specially designed to used in high voltage systems globally.</p>\r\n', '35-lasers', '1720173991_Lasar_1.png', '1720173991_Lasar_2.png', '1720010118.jpg', 'Lasers', 'Lasers', 'Lasers', '1', '2024-07-05 15:36:31', '0'),
(36, 'Magnetron & Microwave', 35, 'off', 'Applications which require high voltage handling, high resistance value and low inductance can use our PTE, PTH and PUT range of thick film printed resistors.', '<p>Applications which require high voltage handling, high resistance value and low inductance can use our PTE, PTH and PUT range of thick film printed resistors. These are available in axial type with attached leads and for higher power applications the PUT range is suitable. In some high power magnetrons these combinations of high power, high resistance value are essential and the PEC range of thick film resistors will be a designers best choice.</p>\r\n', '36-magnetron-microwave', '1720174105_Microwave.png', '1720174105_Microwave.png', '1720617775.jpg', 'Magnetron & Microwave', 'Magnetron & Microwave', 'Magnetron & Microwave', '1', '2024-07-10 18:52:55', '0'),
(37, 'Load Banks', 36, 'off', 'Load Banks are used across industries for testing equipment like power supplies – low and high power, generators, inverters, UPS, wind turbines and many others.', '<p>Load Banks are used across industries for testing equipment like power supplies – low and high power, generators, inverters, UPS, wind turbines and many others. They provide a specified load to check the performance of the equipment under test to prove the performance before it can be deployed for use in the field. The specification of load banks can vary greatly from small loads to check small power supplies and convertors which may be a few watts to a kilowatt to large loads which can range from 10KW to Megawatt’s.</p>\r\n\r\n<p>PEC has designed and supplied Load Banks from table top models to large high power and high voltage absorbing units. These are typically custom designed units which are made to meet the specific requirements of customers. Once designed and qualified PEC can supply these in volume at attractive bulk prices to global customers.</p>\r\n\r\n<p><br>\r\nTalk to us about your load bank requirements and see what solutions we can offer for your testing requirements.</p>\r\n', '37-load-banks', '1720174078_Load_bank.png', '1720174078_Load_bank.png', '1720424030.jpg', 'Load Banks', 'Load Banks', 'Load Banks', '1', '2024-07-08 13:03:50', '0'),
(38, 'Electric Vehicles', 37, 'off', 'Electric vehicles have rapidly developed over the last decade after Tesla captured the imagination of the world with their new and highly innovative electric car.', '<p>Electric vehicles have rapidly developed over the last decade after Tesla captured the imagination of the world with their new and highly innovative electric car.</p>\r\n\r\n<p>In response to the requirements in EV systems PEC has developed a range of high quality aluminium housed resistors which can be used in charging circuits, inverters, battery protection applications and also provides specialised current sensing resistors for control applications.</p>\r\n\r\n<p>EV Chargers, especially fast charge circuits, require high power resistors with high overload capacity to protect the charging capacitors.</p>\r\n\r\n<p>PEC can provide UL approved, overload tested and optimised resistors for these applications.</p>\r\n\r\n<p>PEC has a special set of resistors customised for safety applications where a large quantity of stored energy has to be dissipated in a short burst. These have optimised energy absorbing capability for a limited number of such discharges in a small envelope size.</p>\r\n', '38-electric-vehicles', '1720173410_electric_vehicle.png', '1720173410_electric_vehicle.png', '1720423796.jpg', 'Electric Vehicles', 'Electric Vehicles', 'Electric Vehicles', '1', '2024-07-08 12:59:56', '0'),
(39, 'Solar Inverters', 38, 'off', 'A long standing supplier to the Solar Industry, we have specialised products to solve different issues in a solar power generating system.', '<p>A long standing supplier to the Solar Industry, we have specialised products to solve different issues in a solar power generating system. Technology has evolved over the years from low power generating equipment to large Gigawatt scale solar farms which generate electricity for mass consumption.</p>\r\n\r\n<p>We have a range of small resistors which are used for inrush protection, earth fault detection & current sensing which can be used in small power inverter systems.</p>\r\n\r\n<p>For the larger Megawatt size inverter systems, we have harmonic filter resistors, precharge resistors, discharge resistors and many resistors which can be used in the control boards.</p>\r\n\r\n<p>There is a significant impact on equipment due to harmonics produced in the inversion process and resistors help reduce these unwanted harmonics. Specially designed precharge resistors can ensure that the large capacitors used in the system are not damaged during the switch on cycles.</p>\r\n\r\n<p>Solar inverters used outdoors in cold climatic conditions require Air Heaters to raise the cabinet temperature to levels where the IGBT’s can safely start working and generating electricity.</p>\r\n\r\n<p>For this PEC has specially developed efficient Air Heaters which do not draw a surge current at startup giving designers a similar, reliable and long life heater. These are UL, cUL approved and CE marked to meet regulatory requirements in multiple countries.</p>\r\n\r\n<p>Design and customisation is required in most solar system applications and chances are we have a good solution ready for you or one which can be quickly engineered to meet your requirements.</p>\r\n', '39-solar-inverters', '1720174526_Solar_Inverter_1.png', '1720174526_Solar_Inverter_2.png', '1720424184.jpg', 'Solar Inverters', 'Solar Inverters', 'Solar Inverters', '1', '2024-07-08 13:06:24', '0');
INSERT INTO `tbl_application` (`t_id`, `title`, `position`, `show_as_home`, `short_description`, `description`, `slug`, `application_image`, `application_icon_white`, `banner_image`, `seo_title`, `seo_description`, `seo_keywords`, `status`, `created_on`, `delete_status`) VALUES
(40, 'Wind Power Equipment', 39, 'off', 'Already an experienced supplier to the ‘new energy’ sector, onshore and offshore wind remains an area of particular focus. ', '<p>Already an experienced supplier to the ‘new energy’ sector, onshore and offshore wind remains an area of particular focus. New turbine technology can deliver 4.2 MW of power per turbine and we are working with companies who are developing even larger offshore capability.</p>\r\n\r\n<p>Why? … because modern offshore wind turbines deliver clean renewable energy without harming the environment or disrupting communities.</p>\r\n\r\n<p>Wind turbines utilise several PEC power resistors in generator panels, inverter panels and yaw and pitch control panels. A recent contract called for specialist UL approved, anti-condensation heaters obviating condensation build up inside electrical cabinets.</p>\r\n\r\n<p>Our products are used as charge resistors, as filter resistors, balancing resistors, crowbar resistors, dump resistors and harmonic filter resistors. There are also a range of lower power resistors mounted on PCB’s which can be found in different control panels.</p>\r\n', '40-wind-power-equipment', '1720174731_Windmil.png', '1720174731_Windmil.png', '1720424249.jpg', 'Wind Power Equipment', 'Wind Power Equipment', 'Wind Power Equipment', '1', '2024-07-08 13:07:29', '0'),
(41, 'Automotive Battery Management', 39, 'off', 'Battery management is the key problem facing the global automotive industry & the global electronics industry. ', '<p>Battery management is the key problem facing the global automotive industry & the global electronics industry. With the multitude of electronic devices incorporated in Automobiles today monitoring the charging and usage of batteries via various control systems like the ECU is the norm.</p>\r\n\r\n<p>Safety is a major concern for EV manufacturers and for manufacturers of portable battery powered devices like laptops, smart phones, digital cameras, and other handheld personal use devices. Designers incorporate current sensing resistors in their charging and charge monitoring circuits.</p>\r\n\r\n<p>PEC offers E Beam welded current sensing resistors in different design shapes, multiple power and current ratings, different TCR ratings, for surface mounting. We also offer SMD foil resistors where a thin foil is bonded to a ceramic substrate for heatsinking.</p>\r\n', '41-automotive-battery-management', '1720172396_Automate_battery.png', '1720172396_Automate_battery.png', '1720422435.jpg', 'Automotive Battery Management', 'Automotive Battery Management', 'Automotive Battery Management', '1', '2024-07-08 12:37:15', '0'),
(42, 'Current Sensing', 42, 'off', 'Current sensing is an integral part of many electronic circuits today. From determining the charge level of a battery, to metering the current flowing through an electronic meter', '<p>Current sensing is an integral part of many electronic circuits today. From determining the charge level of a battery, to metering the current flowing through an electronic meter, current sensing resistors are basically used to generate a very reliable low voltage signal which can be then fed to a measuring circuit to determine the current in the circuit.</p>\r\n\r\n<p>The resistors need to be stable, have low thermal EMF and have low temperature drift to ensure accurate measurement over a range of ambient temperatures.</p>\r\n\r\n<p>We offer current sense resistors in different designs like leaded and surface mount. In surface mount we have a choice of foil type resistors (ERL/KRL) and E-Beam welded trimetal resistors (PEBW, EBWD).</p>\r\n\r\n<p>In leaded type we have ceramic housed current sense type (PCL & PCLR) and moulded case resistors (PML) type.</p>\r\n', '42-current-sensing', '1720172850_Current_Control.png', '1720172850_Current_Control.png', '1720422494.jpg', 'Current Sensing', 'Current Sensing', 'Current Sensing', '1', '2024-07-08 12:38:14', '0'),
(43, 'EMI suppression', 43, 'off', 'Electromagnetic interference (EMI) is a disturbance generated by an external source that affects an electrical circuit by electromagnetic induction, electrostatic coupling or conduction.', '<p>Electromagnetic interference (EMI) is a disturbance generated by an external source that affects an electrical circuit by electromagnetic induction, electrostatic coupling or conduction.</p>\r\n\r\n<p>The disturbance may degrade the performance of the circuit or even stop it from functioning. In the case of a data path, these effects can range from an increase in error rate to a total loss of the data.</p>\r\n\r\n<p>Both man-made and natural sources generate changing electrical currents and voltages that can cause EMI-ignition systems, cellular networks of mobile phones, lightning, solar flares, and auroras (northern/southern lights). EMI frequently affects AM radios. It can also affect mobile phones, FM Radios, televisions and astronomy equipment.</p>\r\n\r\n<p>PEC has developed specialised resistors which can be used in various parts of the ignition circuit like the spark plug, spark plug caps, HT coil and in any other circuit where conductive EMI needs to be reduced.</p>\r\n\r\n<p>We have special resistors from our PSA series which can provide high inductance in small size, ruggedized for high corrosion resistance and can be used in various automotive applications like two wheelers, four wheelers and small engines.</p>\r\n\r\n<p>These can be customised and supplied in high volume to the automotive industry.</p>\r\n', '43-emi-suppression', '1720173521_EMI_Suppression_1.png', '1720173446_EMI_Suppression_2.png', '1720423813.jpg', 'EMI suppression', 'EMI suppression', 'EMI suppression', '1', '2024-07-08 13:00:13', '0'),
(44, 'Humidity & Moisture Control', 44, 'off', 'Controlling humidity and moisture is critical in many equipment, especially the ones which are in critical applications and need to serve reliably for long durations of time.', '<p>Controlling humidity and moisture is critical in many equipment, especially the ones which are in critical applications and need to serve reliably for long durations of time. Resistors can be used as small heaters for localised heating to control the temperature around critical devices to prevent condensation. These can be small resistors as air heaters mounted on PCB’s, or small aluminium housed resistors which can be used to heat any surface, or specially designed heaters with attached fans to heat a cabinet to required temperature to eliminate moisture and condensation.</p>\r\n', '44-humidity-moisture-control', '1720173803_Humidity.png', '1720173824_Humidity.png', '1720617716.jpg', 'Humidity & Moisture Control', 'Humidity & Moisture Control', 'Humidity & Moisture Control', '1', '2024-07-10 18:51:56', '0'),
(45, 'Cabinet Heating', 40, 'off', 'Electrical equipment cabinets used in colder climate locations and in high humidity locations require heating to reduce the impact of high humidity on electrical and electronic components.', '<p>Electrical equipment cabinets used in colder climate locations and in high humidity locations require heating to reduce the impact of high humidity on electrical and electronic components. In some cases, heating is required to increase the ambient temperature to acceptable levels for functioning of active electronic components like IGBT’s and Thyristors.</p>\r\n\r\n<p>PEC’s FRH range of UL approved Air heaters solutions can provide a very reliable, long life compact unit which system designers can easily integrate into their electrical cabinets.</p>\r\n\r\n<p>The FRH heaters have an inbuilt DIN rail mount for easy fixing in cabinets. They also have an auto resetting overheat protection switch which cuts off power to the heater in case of an eventual fan motor failure due to dust ingress into the shaft and bearings.</p>\r\n\r\n<p>We also support a lower cost range of Air heaters which are based on convective heating without a forced air fan. These are customised units which have power ratings of 100W to 350W from our RH range of heaters.</p>\r\n', '45-cabinet-heating', '1720173634_Heating.png', '1720173634_Heating.png', '1720422453.jpg', 'Cabinet Heating', 'Cabinet Heating', 'Cabinet Heating', '1', '2024-07-10 18:10:15', '0');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_client`
--

CREATE TABLE `tbl_client` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` enum('1','0') NOT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_client`
--

INSERT INTO `tbl_client` (`id`, `title`, `image`, `status`, `created_date`) VALUES
(1, 'Secure Meters', '1720079823_secure-logo_new.png', '1', '2024-07-04 01:27:03'),
(2, 'Schneider Electric', '1720079803_Schneider-Electric-logo-jpg-.png', '1', '2024-07-04 01:26:43'),
(3, 'Indian Railways', '1720079783_indianrailway.png', '1', '2024-07-04 01:26:23'),
(4, 'GE', '1720079767_ge.png', '1', '2024-07-04 01:26:07'),
(5, 'BHEL', '1720079752_bhel.png', '1', '2024-07-04 01:25:52'),
(6, 'ABB', '1720079715_abb-logo-png-transparent.png', '1', '2024-07-04 01:25:15'),
(8, 'Siemens', '1720079841_8.png', '1', '2024-07-04 01:27:21');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_construction`
--

CREATE TABLE `tbl_construction` (
  `c_id` int(11) NOT NULL,
  `construction_title` varchar(255) NOT NULL,
  `construction_description` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `position` int(11) NOT NULL,
  `status` enum('1','0') NOT NULL,
  `delete_status` enum('0','1') NOT NULL,
  `created_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_construction`
--

INSERT INTO `tbl_construction` (`c_id`, `construction_title`, `construction_description`, `slug`, `position`, `status`, `delete_status`, `created_on`) VALUES
(1, 'Aluminium Housed Resistor', 'Aluminium Housed Resistor', '1-aluminium-housed-resistor', 1, '1', '0', '2024-07-10 16:00:57'),
(2, 'Axial Leaded Resistor', 'Axial Leaded Resistor', '2-axial-leaded-resistor', 2, '1', '0', '2024-07-10 16:01:35'),
(3, 'Braking Resistor', 'Braking Resistor', '3-braking-resistor', 3, '1', '0', '2024-07-10 16:01:46'),
(4, 'Capacitor Mounted Resistor', 'Capacitor Mounted Resistor', '4-capacitor-mounted-resistor', 4, '1', '0', '2024-07-10 16:01:57'),
(5, 'Ceramic Housed Resistor', 'Ceramic Housed Resistor', '5-ceramic-housed-resistor', 5, '1', '0', '2024-07-10 16:02:07'),
(6, 'Compact Heating Resistors', 'Compact Heating Resistors', '6-compact-heating-resistors', 6, '1', '0', '2024-07-10 16:02:17'),
(7, 'Current Sense Resistor', 'Current Sense Resistor', '7-current-sense-resistor', 7, '1', '0', '2024-07-10 16:02:27'),
(8, 'EMI Supression Resistor', 'EMI Supression Resistor', '8-emi-supression-resistor', 8, '1', '0', '2024-07-10 16:02:39'),
(9, 'High Voltage Withstanding Resistor', 'High Voltage Withstanding Resistor', '9-high-voltage-withstanding-resistor', 9, '1', '0', '2024-07-10 16:02:47'),
(10, 'Precision Resistor', 'Precision Resistor', '10-precision-resistor', 10, '1', '0', '2024-07-10 16:02:57'),
(11, 'PTC Braking Resistor', 'PTC Braking Resistor', '11-ptc-braking-resistor', 11, '1', '0', '2024-07-10 16:03:07'),
(12, 'Silicone Coated Resistor', 'Silicone Coated Resistor', '12-silicone-coated-resistor', 12, '1', '0', '2024-07-10 16:03:16'),
(13, 'Steel Grid Resistor', 'Steel Grid Resistor', '13-steel-grid-resistor', 13, '1', '0', '2024-07-10 16:03:25'),
(14, 'Surface Mount Resistor', 'Surface Mount Resistor', '14-surface-mount-resistor', 14, '1', '0', '2024-07-10 16:03:34'),
(15, 'Surge (High Voltage) Protection Resistor', 'Surge (High Voltage) Protection Resistor', '15-surge-high-voltage-protection-resistor', 15, '1', '0', '2024-07-10 16:03:47'),
(16, 'Tubular Power Resistor', 'Tubular Power Resistor', '16-tubular-power-resistor', 16, '1', '0', '2024-07-10 16:03:56'),
(17, 'Vertical Mounted Resistor ', 'Vertical Mounted Resistor ', '17-vertical-mounted-resistor', 17, '1', '0', '2024-07-10 16:04:05'),
(18, 'Vitreous Enamelled Resistor', 'Vitreous Enamelled Resistor ', '0', 18, '1', '0', '2024-07-10 16:37:43');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contact_us`
--

CREATE TABLE `tbl_contact_us` (
  `id` int(11) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `address_title` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `embedded_url` text NOT NULL,
  `phone` varchar(50) NOT NULL,
  `fax` varchar(150) NOT NULL,
  `email` varchar(50) NOT NULL,
  `status` enum('1','0') NOT NULL,
  `address_type` enum('Other','Main') NOT NULL,
  `telephone` varchar(250) NOT NULL,
  `person_name` varchar(250) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_contact_us`
--

INSERT INTO `tbl_contact_us` (`id`, `company_name`, `address_title`, `address`, `embedded_url`, `phone`, `fax`, `email`, `status`, `address_type`, `telephone`, `person_name`) VALUES
(1, 'sales@peccomponents.com', 'Precision Electronic Components Mfg Co (Head Office)', 'B51, Electronic Complex, Kushaiguda, \r\nHyderabad 500062, India.', '&lt;iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3805.612309117447!2d78.56765787357998!3d17.478260500914878!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bcb9c80c0000001:0xa4b72a119a79a064!2sPrecision Electronic Components Manufacturing Company!5e0!3m2!1sen!2sin!4v1715777487214!5m2!1sen!2sin\" width=\"100%\" height=\"350\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"&gt;&lt;/iframe&gt;', '+91 40-27126228, 27120283', '+91 40-27126221', 'sales@peccomponents.com', '1', 'Main', '+91 40-27126228, 27120283', ''),
(3, 'Worldwide', 'International Sales Desk', 'Diamondlee House', '', '+44 (0)1793 737 269', '', 'johnstooke@peccomponents.com', '1', 'Other', '', 'Mr. John A Stooke'),
(4, 'Europe ', 'Central European Sales', 'Gerolsbach, Germany', ' ', '+49 (0)151 5500 5510', '', 'gerhard-pahlke@peccomponents.com', '1', 'Other', '', 'Mr. Gerhard Pahlke'),
(5, 'Worldwide', 'Application Engineering', 'B51, Electronic Complex, Kushaiguda, \r\nHyderabad 500062, India.', ' ', '+91 40-27126228, 27120283', '', 'vcsekhar@peccomponents.com', '1', 'Other', '', 'V. Chandrasekhar');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_event`
--

CREATE TABLE `tbl_event` (
  `e_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `event_image` varchar(255) NOT NULL,
  `meta_title` varchar(255) NOT NULL,
  `meta_keywords` varchar(255) NOT NULL,
  `meta_description` longtext NOT NULL,
  `added_date` datetime NOT NULL,
  `status` enum('1','0') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_event`
--

INSERT INTO `tbl_event` (`e_id`, `title`, `slug`, `description`, `start_date`, `end_date`, `event_image`, `meta_title`, `meta_keywords`, `meta_description`, `added_date`, `status`) VALUES
(1, 'Event is PCIM Europe', 'event-is-pcim-europe', '<p>&nbsp;</p>\r\n\r\n<p>Event is PCIM Europe held from June <strong>11-13<sup>th</sup>&nbsp;2024</strong>.</p>\r\n\r\n<p>Upcoming Event will be :<strong>&nbsp;</strong></p>\r\n\r\n<ul>\r\n	<li>\r\n	<p><strong>Electronica India 2024 &ndash; September 10<sup>th</sup>&nbsp;-12<sup>th</sup>&nbsp;2024</strong>.&nbsp;</p>\r\n	</li>\r\n	<li>\r\n	<p>Please see enclosed photograph of <strong>PCIM Europe Stand</strong>.</p>\r\n	</li>\r\n</ul>\r\n', '0000-00-00', '0000-00-00', '1720002621_IMG_1439.jpg', '', '', '', '2024-08-20 06:46:29', '1'),
(2, 'Test Data', 'test-data', '<p>Test</p>\r\n', '0000-00-00', '0000-00-00', '1717573930_2.jpeg', '', '', '', '2024-06-05 01:24:01', '0');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_forgotpwd`
--

CREATE TABLE `tbl_forgotpwd` (
  `forgotpwd_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `randcode` varchar(25) NOT NULL,
  `user` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_leads`
--

CREATE TABLE `tbl_leads` (
  `l_id` int(11) NOT NULL,
  `lead_name` varchar(255) NOT NULL,
  `lead_email` varchar(255) NOT NULL,
  `lead_subject` varchar(255) NOT NULL,
  `lead_message` text NOT NULL,
  `created_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_leads`
--

INSERT INTO `tbl_leads` (`l_id`, `lead_name`, `lead_email`, `lead_subject`, `lead_message`, `created_on`) VALUES
(2, 'pratibha', 'pratibha.shirsath@technokeens.com', 'General Inquiry', 'hwg', '2024-05-31 11:08:47'),
(3, 'pratibha', 'pratibha.shirsath@technokeens.com', 'General Inquiry', 'qdkgsac', '2024-05-31 11:09:01'),
(4, 'ashita', 'ashita.kumawat@technokeens.com', 'Careers', 'Hello', '2024-05-31 11:15:47'),
(5, 'Sagar', 'sagar.gaidhani@technokeens.com', 'General Inquiry', 'oh', '2024-06-03 13:45:58'),
(6, 'sagar', 'sagartrechnokeens@gmail.com', 'Custom Solutions', 'testing ', '2024-06-18 16:53:16');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mailsetting`
--

CREATE TABLE `tbl_mailsetting` (
  `id` int(11) NOT NULL,
  `smtphost` varchar(150) NOT NULL,
  `smtpport` varchar(150) NOT NULL,
  `smtpuser` varchar(150) NOT NULL,
  `smtppass` varchar(150) NOT NULL,
  `email_send_to` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_mailsetting`
--

INSERT INTO `tbl_mailsetting` (`id`, `smtphost`, `smtpport`, `smtpuser`, `smtppass`, `email_send_to`) VALUES
(1, 'ssl://smtp.zoho.com', '465', 'ashita.kumawat@technokeens.com', 'YXNoaXRhQDEyMw==', 'ahire.sharyu3945@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_power_rating`
--

CREATE TABLE `tbl_power_rating` (
  `pr_id` int(11) NOT NULL,
  `power_rating` varchar(255) NOT NULL,
  `unit` varchar(255) NOT NULL,
  `position` int(11) NOT NULL,
  `status` enum('1','0') NOT NULL,
  `delete_status` enum('0','1') NOT NULL,
  `created_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_power_rating`
--

INSERT INTO `tbl_power_rating` (`pr_id`, `power_rating`, `unit`, `position`, `status`, `delete_status`, `created_on`) VALUES
(1, '0.1W', '', 1, '1', '0', '2024-06-12 10:30:29'),
(2, '0.2W', '', 2, '1', '0', '2024-06-12 10:30:40'),
(3, '0.25W', '', 3, '1', '0', '2024-06-10 11:46:09'),
(4, '0.3W @ 70°C ', '', 4, '1', '0', '2024-06-11 18:02:05'),
(5, '0.33W', '', 5, '1', '0', '2024-06-10 10:55:30'),
(6, '0.5W', '', 8, '1', '0', '2024-06-12 13:40:42'),
(7, '0.7W @ 70°C', '', 9, '1', '0', '2024-06-11 18:01:54'),
(8, '0.75W', '', 10, '1', '0', '2024-06-10 10:56:12'),
(9, '1W', '', 11, '1', '0', '2024-06-10 10:56:24'),
(10, '1W @ 70°C', '', 12, '1', '0', '2024-06-11 18:01:29'),
(11, '1W', '', 13, '0', '0', '2024-06-11 18:01:20'),
(12, '2W', '', 14, '1', '0', '2024-06-10 10:57:13'),
(13, '2W @ 25°C', '', 15, '1', '0', '2024-06-11 18:00:55'),
(14, '2W @ 70°C', '', 16, '1', '0', '2024-06-11 18:00:46'),
(15, '2.5W @ 70°C', '', 17, '1', '0', '2024-06-11 18:00:40'),
(16, '2.50W', '', 18, '0', '0', '2024-06-10 10:58:16'),
(17, '3W', '', 19, '1', '0', '2024-06-10 10:58:53'),
(18, '1.5W', '', 20, '1', '0', '2024-06-11 18:00:25'),
(19, '3W @ 25°C', '', 21, '1', '0', '2024-06-11 17:59:36'),
(20, '2.6W @ 70°C', '', 22, '1', '0', '2024-06-12 13:39:14'),
(21, '3W @ 70°C', '', 23, '1', '0', '2024-06-12 13:39:38'),
(22, '3W @ 70°C', '', 24, '0', '0', '2024-06-12 13:39:06'),
(23, '3W', '', 25, '0', '0', '2024-06-12 13:40:03'),
(24, '3W @ 25°C', '', 26, '0', '0', '2024-06-12 13:39:00'),
(25, '3.5W @ 70°C', '', 27, '1', '0', '2024-06-12 13:38:53'),
(26, '4W', '', 28, '1', '0', '2024-06-10 11:04:03'),
(27, '4W @ 25°C', '', 28, '1', '0', '2024-06-12 13:38:49'),
(28, '4W @ 70°C', '', 29, '1', '0', '2024-06-12 13:38:41'),
(29, '4W', '', 30, '0', '0', '2024-06-12 13:40:06'),
(30, '4W @ 25°C', '', 31, '0', '0', '2024-06-11 17:58:34'),
(31, '5W', '', 31, '1', '0', '2024-06-10 12:00:04'),
(32, ' 2.5W', '', 32, '1', '0', '2024-06-11 17:58:22'),
(33, '5W @ 20°C ', '', 33, '1', '0', '2024-06-11 17:56:59'),
(34, '5W @ 25°C', '', 34, '1', '0', '2024-06-11 17:56:55'),
(35, '4.3W @ 70°C', '', 35, '1', '0', '2024-06-11 17:56:21'),
(36, '5W @ 70°C', '', 36, '1', '0', '2024-06-11 17:55:50'),
(37, '6W', '', 37, '1', '0', '2024-06-11 17:55:00'),
(38, '6W @ 25°C', '', 37, '1', '0', '2024-06-11 17:54:24'),
(39, '6.5W @ 70°C', '', 39, '1', '0', '2024-06-11 17:54:16'),
(40, '7W', '', 40, '1', '0', '2024-06-10 12:07:01'),
(41, '7W @ 25°C', '', 41, '1', '0', '2024-06-11 17:49:36'),
(42, '7W @ 70°C', '', 42, '1', '0', '2024-06-11 17:49:32'),
(43, '6W @ 70°C', '', 37, '1', '0', '2024-06-11 17:53:40'),
(44, '8W', '', 44, '1', '0', '2024-06-10 12:09:30'),
(45, '8W @ 70°C', '', 45, '1', '0', '2024-06-11 17:49:28'),
(46, '9W', '', 46, '1', '0', '2024-06-10 12:10:07'),
(47, '9W @ 70°C', '', 47, '1', '0', '2024-06-11 17:49:06'),
(48, '10W', '', 47, '1', '0', '2024-06-10 12:10:46'),
(49, '6W', '', 48, '0', '0', '2024-06-11 17:48:35'),
(50, '10W @ 20°C', '', 49, '1', '0', '2024-06-11 17:44:22'),
(51, '10W @ 25°C', '', 50, '1', '0', '2024-06-11 17:44:16'),
(52, '10W @ 70°C', '', 51, '1', '0', '2024-06-11 17:44:10'),
(53, '8.5W @ 70°C', '', 52, '1', '0', '2024-06-11 17:46:13'),
(54, '10W@25°C, 9W@70°C', '', 53, '0', '0', '2024-06-10 12:26:22'),
(55, '11W', '', 54, '0', '0', '2024-06-10 12:26:54'),
(56, '11W @ 25°C', '', 54, '0', '0', '2024-06-11 17:43:24'),
(57, '11W @ 70°C', '', 55, '1', '0', '2024-06-11 17:43:20'),
(58, '12W', '', 56, '1', '0', '2024-06-11 17:43:03'),
(59, '12W @ 25°C', '', 57, '1', '0', '2024-06-11 17:42:58'),
(60, '12W @ 70°C', '', 58, '1', '0', '2024-06-11 17:42:32'),
(61, '12W@25°C, 10W@70°C', '', 59, '0', '0', '2024-06-10 12:30:12'),
(62, '13W', '', 59, '0', '0', '2024-06-10 12:30:43'),
(63, '13W @ 25°C', '', 60, '1', '0', '2024-06-11 17:41:37'),
(64, '13W @ 70°C', '', 61, '0', '0', '2024-06-11 17:41:34'),
(65, '13W@25°C, 11W@70°C', '', 62, '0', '0', '2024-06-10 12:31:49'),
(66, '14W', '', 62, '1', '0', '2024-06-11 17:45:16'),
(67, '14W @ 25°C', '', 63, '1', '0', '2024-06-11 17:40:12'),
(68, '14W @ 70°C', '', 63, '0', '0', '2024-06-11 17:40:06'),
(69, '14W @ 25°C, 12W @ 70°C', '', 64, '0', '0', '2024-06-12 10:53:48'),
(70, '15W', '', 65, '1', '0', '2024-06-10 12:34:05'),
(71, '15W @ 25°C', '', 71, '1', '0', '2024-06-11 17:36:57'),
(72, '17W', '', 72, '1', '0', '2024-06-10 16:40:41'),
(73, '17W @ 70°C', '', 73, '1', '0', '2024-06-11 17:36:57'),
(74, '20W', '', 74, '1', '0', '2024-06-10 16:41:57'),
(75, '20W @ 20°C', '', 75, '1', '0', '2024-06-11 17:36:57'),
(76, '20W @ 25°C', '', 76, '1', '0', '2024-06-11 17:36:57'),
(77, '25W', '', 77, '1', '0', '2024-06-10 17:21:34'),
(78, '25W @ 25°C', '', 78, '1', '0', '2024-06-11 17:36:25'),
(79, '30W', '', 79, '1', '0', '2024-06-10 17:23:15'),
(80, '30W @ 20°C', '', 79, '1', '0', '2024-06-11 17:35:32'),
(81, '35W', '', 80, '1', '0', '2024-06-10 17:24:28'),
(82, '40W', '', 81, '1', '0', '2024-06-10 17:24:45'),
(83, '40W @ 20°C', '', 82, '1', '0', '2024-06-11 17:35:28'),
(84, '50W', '', 84, '1', '0', '2024-06-10 17:25:18'),
(85, '50W @ 25°C ', '', 85, '1', '0', '2024-06-11 17:35:24'),
(86, '60W', '', 86, '1', '0', '2024-06-10 17:27:40'),
(87, '60W @ 20°C in Free Air', '', 87, '1', '0', '2024-06-11 17:34:58'),
(88, '60W @ 40°C', '', 87, '1', '0', '2024-06-11 17:34:54'),
(89, '70W', '', 88, '1', '0', '2024-06-10 17:29:28'),
(90, '75W', '', 89, '1', '0', '2024-06-10 17:29:43'),
(91, '75W @ 40°C', '', 89, '1', '0', '2024-06-11 17:33:13'),
(92, '80W @ 40°C', '', 90, '1', '0', '2024-06-11 17:33:09'),
(93, '90W @ 25°C', '', 91, '1', '0', '2024-06-11 17:33:05'),
(94, '100W', '', 91, '1', '0', '2024-06-10 17:30:59'),
(95, '100W @ 20°C in Free Air', '', 92, '1', '0', '2024-06-11 17:32:48'),
(96, '100W @ 25⁰C', '', 96, '1', '0', '2024-06-11 17:32:37'),
(97, '100W @ 40°C', '', 97, '1', '0', '2024-06-11 16:58:30'),
(98, '125W @ 40°C', '', 97, '1', '0', '2024-06-11 16:58:20'),
(99, '150W', '', 97, '1', '0', '2024-06-10 17:33:31'),
(100, '150W @ 40°C', '', 98, '1', '0', '2024-06-11 16:57:31'),
(101, '160W @ 40°C', '', 99, '1', '0', '2024-06-11 16:57:27'),
(102, '175W @ 25⁰C', '', 100, '1', '0', '2024-06-11 16:57:03'),
(103, '180W @ 25°C ', '', 101, '1', '0', '2024-06-11 16:56:59'),
(104, '180W @ 40°C', '', 102, '1', '0', '2024-06-11 16:56:54'),
(105, '200W', '', 103, '1', '0', '2024-06-10 17:37:18'),
(106, '200W @ 40°C', '', 103, '1', '0', '2024-06-11 16:56:36'),
(107, '225W @ 25⁰C', '', 105, '1', '0', '2024-06-11 16:56:28'),
(108, '250W', '', 106, '1', '0', '2024-06-10 17:38:07'),
(109, '260W @ 40°C', '', 107, '1', '0', '2024-06-11 16:56:12'),
(110, '300W', '', 108, '1', '0', '2024-06-10 17:38:32'),
(111, '300W @ 25°C', '', 109, '1', '0', '2024-06-11 16:55:45'),
(112, '300W @ 40°C', '', 110, '1', '0', '2024-06-11 16:55:40'),
(113, '315W @ 40°C', '', 111, '1', '0', '2024-06-11 16:55:34'),
(114, '375W @ 25°C', '', 112, '1', '0', '2024-06-11 16:54:36'),
(115, '390W @ 40°C', '', 113, '1', '0', '2024-06-11 16:54:30'),
(116, '400W', '', 115, '1', '0', '2024-06-10 17:40:55'),
(117, '400W @ 40°C', '', 116, '1', '0', '2024-06-11 16:54:26'),
(118, '450W @ 40°C*', '', 118, '1', '0', '2024-06-11 16:54:05'),
(119, '480W @ 40°C', '', 119, '1', '0', '2024-06-11 16:53:59'),
(120, '500W', '', 119, '1', '0', '2024-06-10 17:45:53'),
(121, '500W @ 20°C', '', 120, '1', '0', '2024-06-11 16:53:39'),
(122, '500W @ 40°C', '', 121, '1', '0', '2024-06-11 16:53:31'),
(123, '525W @ 40°C', '', 122, '1', '0', '2024-06-11 16:53:13'),
(124, '600W @ 40°C', '', 123, '1', '0', '2024-06-11 11:56:48'),
(125, '650W @ 40°C', '', 124, '1', '0', '2024-06-11 16:52:56'),
(126, '1000W @ 40°C', '', 125, '0', '0', '2024-06-11 16:52:46'),
(127, '1230W @ 40°C', '', 126, '1', '0', '2024-06-11 16:52:34'),
(128, '1475W @  40°C', '', 127, '1', '0', '2024-06-11 16:52:15'),
(129, '1700W @  40°C', '', 128, '1', '0', '2024-06-11 16:52:04');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `p_id` int(11) NOT NULL,
  `application_id` varchar(255) NOT NULL,
  `series_id` int(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `position` int(11) NOT NULL,
  `termination_type` varchar(255) NOT NULL,
  `power_rating` varchar(255) NOT NULL,
  `cross_reference` text NOT NULL,
  `min_resistance` varchar(255) NOT NULL,
  `max_resistance` varchar(255) NOT NULL,
  `resistor_tolerance` varchar(255) NOT NULL,
  `tcr_ppm_c` varchar(255) NOT NULL,
  `dimension_width` float NOT NULL,
  `dimension_height` float NOT NULL,
  `meta_title` varchar(255) NOT NULL,
  `meta_keyword` varchar(255) NOT NULL,
  `meta_description` varchar(255) NOT NULL,
  `related_series` text NOT NULL,
  `status` enum('1','0') NOT NULL,
  `delete_status` enum('0','1') NOT NULL,
  `created_on` datetime NOT NULL,
  `updated_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`p_id`, `application_id`, `series_id`, `product_name`, `slug`, `description`, `position`, `termination_type`, `power_rating`, `cross_reference`, `min_resistance`, `max_resistance`, `resistor_tolerance`, `tcr_ppm_c`, `dimension_width`, `dimension_height`, `meta_title`, `meta_keyword`, `meta_description`, `related_series`, `status`, `delete_status`, `created_on`, `updated_on`) VALUES
(1, '2,6,8,9,10,11,12,13,14,15,16,17', 11, 'PVR5', '1-pvr5', '<p>PVR5</p>\r\n', 1, 'Radial Tubular Lug Terminals', '34', '', '1Ω', '1KΩ', '±5% -1Ω and  over,  ±10% - under 1Ω', '<5Ω:  ±260ppm /⁰C, >5Ω: <±200ppm /⁰C', 7.94, 25.4, 'PVR5', 'PVR5', 'PVR5', '11', '1', '0', '2024-06-17 18:57:24', '0000-00-00 00:00:00'),
(2, '2,6,8,9,10,11,12,13,14,15,16,17', 11, 'PVR25', '2-pvr25', '<ul>\r\n	<li>High Temp Silicone Coating.</li>\r\n	<li>Close Tolerance, Low TCR.</li>\r\n	<li>Non Inductive Versions.</li>\r\n	<li>Approved since 1977 to JSS 50402.</li>\r\n	<li>High Surge Version Available.</li>\r\n	<li>Meets CECC 40201 Specs.</li>\r\n	<li>PEC Resistors are RoHS compliant.</li>\r\n</ul>\r\n', 2, 'Radial Tubular Lug Terminals', '78', '', '1Ω', '10KΩ', '±5% -1Ω and  over, ±10% - under 1Ω', '<5Ω:  ±260ppm /⁰C, >5Ω: <±200ppm /⁰C', 14.29, 50.8, 'PVR25', 'PVR25', 'PVR25', '11', '1', '0', '2024-06-17 18:58:44', '0000-00-00 00:00:00'),
(3, '2,6,8,9,10,11,12,13,14,15,16,17', 11, 'PVR50', '3-pvr50', '<ul>\r\n	<li>Boat/Bathtub Style Ceramic Case.</li>\r\n	<li>High Insulation Resistance.</li>\r\n	<li>Salt Fog Withstanding Versions.</li>\r\n	<li>High Surge Version Available.</li>\r\n	<li>Non Inductive Resistors Available.</li>\r\n	<li>Low TCR Available.</li>\r\n	<li>PEC Resistors are RoHS compliant.</li>\r\n</ul>\r\n', 3, 'Radial Tubular Lug Terminals', '85', '', '1.5Ω', '15KΩ', '±5% -1Ω and  over, ±10% - under 1Ω', '<5Ω:  ±260ppm /⁰C, >5Ω: <±200ppm /⁰C', 14.29, 101.6, 'PVR50', 'PVR50', 'PVR50', '11', '1', '0', '2024-06-17 18:59:17', '0000-00-00 00:00:00'),
(4, '2,8,9,10,11,12,13,14,15,16,17', 11, 'PVR100', '4-pvr100', '<p>PVR100</p>\r\n', 4, 'Radial Tubular Lug Terminals', '96', '', '2.7Ω', '20KΩ', '±5% -1Ω and  over, ±10% - under 1Ω', '<5Ω:  ±260ppm /⁰C, >5Ω: <±200ppm /⁰C', 19.05, 165.1, 'PVR100', 'PVR100', 'PVR100', '11', '1', '0', '2024-06-17 19:00:00', '0000-00-00 00:00:00'),
(5, '2,6,8,9,10,11,12,13,14,15,16,17', 11, 'PVR175', '5-pvr175', '<p>P3B</p>\r\n', 5, 'Radial Tubular Lug Terminals', '102', '', '3.3Ω', '39KΩ', '±5% -1Ω and  over, ±10% - under 1Ω', '<5Ω:  ±260ppm /⁰C, >5Ω: <±200ppm /⁰C', 28.58, 215.9, 'PVR175', 'PVR175', 'PVR175', '11', '1', '0', '2024-06-21 12:48:14', '0000-00-00 00:00:00'),
(6, '2,6,8,9,10,11,12,13,14,15,16,17', 11, 'PVR225', '6-pvr225', '<p>PVR225</p>\r\n', 6, 'Radial Tubular Lug Terminals', '107', '', '3.3Ω', '47KΩ', '±5% -1Ω and  over, ±10% - under 1Ω', '<5Ω:  ±260ppm /⁰C, >5Ω: <±200ppm /⁰C', 28.58, 266.7, 'PVR225', 'PVR225', 'PVR225', '11', '1', '0', '2024-06-18 11:19:16', '0000-00-00 00:00:00'),
(7, '2,4,8,9,10,11,12,13,14,15,16', 10, 'PPR04', '7-ppr04', '<p>PPR04</p>\r\n', 8, 'Radial Tubular Lug Terminals', '26', '', '0.1Ω', '1.5KΩ', '±5% >1Ω ±10% - <1Ω (or) ±0R05 or whichever is greater  For Tapped/Adjustable/Non-Inductive values ±10% Other tolerances on request', '±50ppm/°C,  JSS limit = ±200ppm/°C,  MIL limit = ±260ppm/°C [in lower values higher TCR wires may be used]', 9.5, 20, 'PPR04', 'PPR04', 'PPR04', '10', '1', '0', '2024-06-17 19:01:43', '0000-00-00 00:00:00'),
(8, '2,4,8,9,10,11,12,13,14,15,16', 10, 'PPR05', '8-ppr05', '<p>PPR05</p>\r\n', 6, 'PHA2', '31', '', '0.1Ω', '2KΩ', '±5% >1Ω ±10% - <1Ω (or) ±0R05 or whichever is greater  For Tapped/Adjustable/Non-Inductive values ±10% Other tolerances on request', '±50ppm/°C,  JSS limit = ±200ppm/°C,  MIL limit = ±260ppm/°C [in lower values higher TCR wires may be used]', 9.5, 25, 'PPR05', 'PPR05', 'PPR05', '10', '1', '0', '2024-06-17 19:01:59', '0000-00-00 00:00:00'),
(9, '2,4,8,9,10,11,12,13,14,15,16', 10, 'PPR08', '9-ppr08', '<p>PPR08</p>\r\n', 7, 'Radial Tubular Lug Terminals', '44', '', '0.1Ω', '3.3KΩ', '±5% >1Ω ±10% - <1Ω (or) ±0R05 or whichever is greater  For Tapped/Adjustable/Non-Inductive values ±10% Other tolerances on request', '±50ppm/°C,  JSS limit = ±200ppm/°C,  MIL limit = ±260ppm/°C [in lower values higher TCR wires may be used]', 9.5, 35, 'PPR08', 'PPR08', 'PPR08', '10', '1', '0', '2024-06-17 19:02:30', '0000-00-00 00:00:00'),
(10, '2,4,8,9,10,11,12,13,14,15,16', 10, 'PPR10', '10-ppr10', '<p>PPR10</p>\r\n', 10, 'Radial Tubular Lug Terminals', '48', '', '0.1Ω', '3.9KΩ', '±5% >1Ω ±10% - <1Ω (or) ±0R05 or whichever is greater  For Tapped/Adjustable/Non-Inductive values ±10% Other tolerances on request', '±50ppm/°C,  JSS limit = ±200ppm/°C,  MIL limit = ±260ppm/°C [in lower values higher TCR wires may be used]', 9.5, 45, 'PPR10', 'PPR10', 'PPR10\r\n', '10', '1', '0', '2024-06-17 19:02:49', '0000-00-00 00:00:00'),
(11, '2,4,8,9,10,11,12,13,14,15,16', 10, 'PPR10A', '11-ppr10a', '<p>PPR10A</p>\r\n', 10, 'Radial Tubular Lug Terminals', '48', '', '0.1Ω', '2.7KΩ', '±5% >1Ω ±10% - <1Ω (or) ±0R05 or whichever is greater  For Tapped/Adjustable/Non-Inductive values ±10% Other tolerances on request', '±50ppm/°C,  JSS limit = ±200ppm/°C,  MIL limit = ±260ppm/°C [in lower values higher TCR wires may be used]', 15, 27, 'PPR10A', 'PPR10A', 'PPR10A\r\n', '10', '1', '0', '2024-06-17 19:03:52', '0000-00-00 00:00:00'),
(12, '2,4,8,9,10,11,12,13,14,15,16', 10, 'PPR15', '12-ppr15', '<p>PPR15</p>\r\n', 12, 'Radial Tubular Lug Terminals', '70', '', '0.1Ω', '6.2K', '±5% >1Ω ±10% - <1Ω (or) ±0R05 or which ever is greater  For Tapped/Adjustable/Non-Inductive values ±10% Other tolerances on request', '±50ppm/°C,  JSS limit = ±200ppm/°C,  MIL limit = ±260ppm/°C [in lower values higher TCR wires may be used]', 15, 40, 'PPR15', 'PPR15', 'PPR15', '10', '1', '0', '2024-06-17 19:04:46', '0000-00-00 00:00:00'),
(13, '2,6,8,9,10,11,12,13,14,15,16,17', 11, 'PVR20', '13-pvr20', '<p>PVR20</p>\r\n', 2, 'Radial Tubular Lug Terminals', '76', '', '0.1Ω', '10KΩ', '±5% -1Ω and  over, ±10% - under 1Ω', '<5Ω:  ±260ppm /⁰C, >5Ω: <±200ppm /⁰C', 11.11, 50.8, 'PVR20', 'PVR20', 'PVR20', '11', '1', '0', '2024-06-17 19:06:40', '0000-00-00 00:00:00'),
(14, '2,4,8,9,10,11,12,13,14,15,16', 10, 'PPR17', '14-ppr17', '<p>PPR17</p>\r\n', 14, 'Radial Tubular Lug Terminals', '72', '', '0.1Ω', '6.8K', '±5% >1Ω ±10% - <1Ω (or) ±0R05 or whichever is greater  For Tapped/Adjustable/Non-Inductive values ±10% Other tolerances on request', '±50ppm/°C,  JSS limit = ±200ppm/°C,  MIL limit = ±260ppm/°C [in lower values higher TCR wires may be used]', 15, 51, 'PPR17', 'PPR17', 'PPR17', '10', '1', '0', '2024-06-17 19:07:13', '0000-00-00 00:00:00'),
(15, '2,4,8,9,10,11,12,13,14,15,16', 10, 'PPR20', '15-ppr20', '<p>PPR20</p>\r\n', 15, 'Radial Tubular Lug Terminals', '74', '', '1Ω', '10KΩ', '±5% >1Ω ±10% - <1Ω (or) ±0R05 or whichever is greater  For Tapped/Adjustable/Non-Inductive values ±10% Other tolerances on request', '±50ppm/°C,  JSS limit = ±200ppm/°C,  MIL limit = ±260ppm/°C [in lower values higher TCR wires may be used]', 15, 62, 'PPR20', 'PPR20', 'PPR20', '10', '1', '0', '2024-06-18 10:27:26', '0000-00-00 00:00:00'),
(16, '2,4,8,9,10,11,12,13,14,15,16', 10, 'PPR25', '16-ppr25', '<p>PPR25</p>\r\n', 16, 'Radial Tubular Lug Terminals', '77', '', '0.1Ω', '18KΩ', '±5% >1Ω ±10% - <1Ω (or) ±0R05 or whichever is greater  For Tapped/Adjustable/Non-Inductive values ±10% Other tolerances on request', '±50ppm/°C,  JSS limit = ±200ppm/°C,  MIL limit = ±260ppm/°C [in lower values higher TCR wires may be used]', 15, 78, 'PPR25', 'PPR25', 'PPR25', '10', '1', '0', '2024-06-18 10:26:46', '0000-00-00 00:00:00'),
(17, '2,4,8,9,10,11,12,13,14,15,16', 10, 'PPR25A', '17-ppr25a', '<p>PPR25A</p>\r\n', 17, 'Radial Tubular Lug Terminals', '77', '', '0.1Ω', '12KΩ', '±5% >1Ω ±10% - <1Ω (or) ±0R05 or whichever is greater  For Tapped/Adjustable/Non-Inductive values ±10% Other tolerances on request', '±50ppm/°C,  JSS limit = ±200ppm/°C,  MIL limit = ±260ppm/°C [in lower values higher TCR wires may be used]', 19, 62, 'PPR25A', 'PPR25A', 'PPR25A', '10', '1', '0', '2024-06-18 10:26:18', '0000-00-00 00:00:00'),
(18, '2,4,8,9,10,11,12,13,14,15,16', 10, 'PPR25B', '18-ppr25b', '<p>PPR25B</p>\r\n', 18, 'Radial Tubular Lug Terminals', '77', '', '0.1Ω', '10KΩ', '±5% >1Ω ±10% - <1Ω (or) ±0R05 or whichever is greater  For Tapped/Adjustable/Non-Inductive values ±10% Other tolerances on request', '±50ppm/°C,  JSS limit = ±200ppm/°C,  MIL limit = ±260ppm/°C [in lower values higher TCR wires may be used]', 19, 50, 'PPR25B', 'PPR25B', 'PPR25B', '10', '1', '0', '2024-06-18 10:25:00', '0000-00-00 00:00:00'),
(19, '2,4,8,9,10,11,12,13,14,15,16', 10, 'PPR35', '19-ppr35', '<p>PPR35</p>\r\n', 18, 'Radial Tubular Lug Terminals', '81', '', '0.1Ω', '18KΩ', '±5% >1Ω ±10% - <1Ω (or) ±0R05 or whichever is greater  For Tapped/Adjustable/Non-Inductive values ±10% Other tolerances on request', '±50ppm/°C,  JSS limit = ±200ppm/°C,  MIL limit = ±260ppm/°C [in lower values higher TCR wires may be used]', 19, 75, 'PPR35', 'PPR35', 'PPR35', '10', '1', '0', '2024-06-18 10:23:30', '0000-00-00 00:00:00'),
(20, '2,4,8,9,10,11,12,13,14,15,16', 10, 'PPR40', '20-ppr40', '<p>PPR40</p>\r\n', 19, 'Radial Tubular Lug Terminals', '82', '', '0.1Ω', '22K', '±5% >1Ω ±10% - <1Ω (or) ±0R05 or whichever is greater  For Tapped/Adjustable/Non-Inductive values ±10% Other tolerances on request', '±50ppm/°C,  JSS limit = ±200ppm/°C,  MIL limit = ±260ppm/°C [in lower values higher TCR wires may be used]', 19, 100, 'PPR40', 'PPR40', 'PPR40', '10', '1', '0', '2024-06-18 10:22:13', '0000-00-00 00:00:00'),
(21, '2,4,8,9,10,11,12,13,14,15,16', 10, 'PPR40A', '21-ppr40a', '<p>PPR40A</p>\r\n', 19, 'Radial Tubular Lug Terminals', '82', '', '0.1Ω', '18KΩ', '±5% >1Ω ±10% - <1Ω (or) ±0R05 or whichever is greater  For Tapped/Adjustable/Non-Inductive values ±10% Other tolerances on request', '±50ppm/°C,  JSS limit = ±200ppm/°C,  MIL limit = ±260ppm/°C [in lower values higher TCR wires may be used]', 24, 83, 'PPR40A', 'PPR40A', 'PPR40A', '10', '1', '0', '2024-06-18 10:28:37', '0000-00-00 00:00:00'),
(22, '2,4,8,9,10,11,12,13,14,15,16', 10, 'PPR50', '22-ppr50', '<p>PPR50</p>\r\n', 20, 'Radial Tubular Lug Terminals', '1,2,84', '', '0.1Ω', '39KΩ', '±5% >1Ω ±10% - <1Ω (or) ±0R05 or whichever is greater  For Tapped/Adjustable/Non-Inductive values ±10% Other tolerances on request', '±50ppm/°C,  JSS limit = ±200ppm/°C,  MIL limit = ±260ppm/°C [in lower values higher TCR wires may be used]', 29.1, 104, 'PPR50', 'PPR50', 'PPR50', '10', '1', '0', '2024-06-11 16:37:33', '0000-00-00 00:00:00'),
(23, '2,4,8,9,10,11,12,13,14,15,16', 10, 'PPR60', '23-ppr60', '<p>PPR60</p>\r\n', 23, 'Radial Tubular Lug Terminals', '86', '', '0.1Ω', '39KΩ', '±5% >1Ω ±10% - <1Ω (or) ±0R05 or whichever is greater  For Tapped/Adjustable/Non-Inductive values ±10% Other tolerances on request', '±50ppm/°C,  JSS limit = ±200ppm/°C,  MIL limit = ±260ppm/°C [in lower values higher TCR wires may be used]', 24, 123, 'PPR60', 'PPR60', 'PPR60', '10', '1', '0', '2024-06-12 15:03:00', '0000-00-00 00:00:00'),
(24, '2,4,8,9,10,11,12,13,14,15,16', 10, 'PPR75', '24-ppr75', '<p>PPR75</p>\r\n', 24, 'Radial Tubular Lug Terminals', '90', '', '0.1Ω', '39KΩ', '±5% >1Ω ±10% - <1Ω (or) ±0R05 or whichever is greater  For Tapped/Adjustable/Non-Inductive values ±10% Other tolerances on request', '±50ppm/°C,  JSS limit = ±200ppm/°C,  MIL limit = ±260ppm/°C [in lower values higher TCR wires may be used]', 33, 100, 'PPR75', 'PPR75', 'PPR75', '10', '1', '0', '2024-06-12 15:15:34', '0000-00-00 00:00:00'),
(25, '2,4,8,9,10,11,12,13,14,15,16', 10, 'PPR100', '25-ppr100', '<p>PPR100</p>\r\n', 25, 'Radial Tubular Lug Terminals', '94', '', '0.1Ω', '91KΩ', '±5% >1Ω ±10% - <1Ω (or) ±0R05 or whichever is greater  For Tapped/Adjustable/Non-Inductive values ±10% Other tolerances on request', '±50ppm/°C,  JSS limit = ±200ppm/°C,  MIL limit = ±260ppm/°C [in lower values higher TCR wires may be used]', 33, 155, 'PPR100', 'PPR100', 'PPR100', '10', '1', '0', '2024-06-12 15:20:21', '0000-00-00 00:00:00'),
(26, '2,4,8,9,10,11,12,13,14,15,16', 10, 'PPR100A', '26-ppr100a', '<p>PPR100A</p>\r\n', 26, 'Radial Tubular Lug Terminals', '94', '', '0.1Ω', '91KΩ', '±5% >1Ω ±10% - <1Ω (or) ±0R05 or whichever is greater  For Tapped/Adjustable/Non-Inductive values ±10% Other tolerances on request', '±50ppm/°C,  JSS limit = ±200ppm/°C,  MIL limit = ±260ppm/°C [in lower values higher TCR wires may be used]', 33, 165, 'PPR100A', 'PPR100A', 'PPR100A', '10', '1', '0', '2024-06-12 15:23:19', '0000-00-00 00:00:00'),
(27, '2,4,8,9,10,11,12,13,14,15,16', 10, 'PPR150', '27-ppr150', '<p>PPR150</p>\r\n', 27, 'Radial Tubular Lug Terminals', '99', '', '0.1Ω', '100KΩ', '±5% >1Ω ±10% - <1Ω (or) ±0R05 or whichever is greater  For Tapped/Adjustable/Non-Inductive values ±10% Other tolerances on request', '±50ppm/°C,  JSS limit = ±200ppm/°C,  MIL limit = ±260ppm/°C [in lower values higher TCR wires may be used]', 33, 205, 'PPR150', 'PPR150', 'PPR150', '10', '1', '0', '2024-06-12 15:25:41', '0000-00-00 00:00:00'),
(28, '2,4,8,9,10,11,12,13,14,15,16', 10, 'PPR200', '28-ppr200', '<p>PPR200</p>\r\n', 28, 'Radial Tubular Lug Terminals', '105', '', '0.1Ω', '100KΩ', '±5% >1Ω ±10% - <1Ω (or) ±0R05 or whichever is greater  For Tapped/Adjustable/Non-Inductive values ±10% Other tolerances on request', '±50ppm/°C,  JSS limit = ±200ppm/°C,  MIL limit = ±260ppm/°C [in lower values higher TCR wires may be used]', 33, 269, 'PPR200', 'PPR200', 'PPR200', '10', '1', '0', '2024-06-12 15:27:32', '0000-00-00 00:00:00'),
(29, '2,4,8,9,10,11,12,13,14,15,16', 10, 'PPR300', '29-ppr300', '<p>PPR300</p>\r\n', 28, 'Radial Tubular Lug Terminals', '110', '', '0.1Ω', '100KΩ', '±5% >1Ω ±10% - <1Ω (or) ±0R05 or whichever is greater  For Tapped/Adjustable/Non-Inductive values ±10% Other tolerances on request', '±50ppm/°C,  JSS limit = ±200ppm/°C,  MIL limit = ±260ppm/°C [in lower values higher TCR wires may be used]', 33, 310, 'PPR300', 'PPR300', 'PPR300\r\n', '10', '1', '0', '2024-06-12 15:29:53', '0000-00-00 00:00:00'),
(30, '2,4,8,9,10,11,12,13,14,15,16', 10, 'PPR500', '30-ppr500', '<p>PPR500</p>\r\n', 29, 'Radial Tubular Lug Terminals', '120', '', '0.1Ω', '100KΩ', '±5% >1Ω ±10% - <1Ω (or) ±0R05 or whichever is greater  For Tapped/Adjustable/Non-Inductive values ±10% Other tolerances on request', '±50ppm/°C,  JSS limit = ±200ppm/°C,  MIL limit = ±260ppm/°C [in lower values higher TCR wires may be used]', 58, 335, 'PPR500', 'PPR500', 'PPR500', '10', '1', '0', '2024-06-12 15:31:53', '0000-00-00 00:00:00'),
(31, '8,9,11,14,18,19,20,21', 4, 'V3B', '31-v3b', '<p>V3B</p>\r\n', 31, 'Axial leaded ', '19,20', '', '0.1Ω', '10KΩ', '±1%, ±2%, ±5%, ±10%', 'Std. < +150 ppm/°C, Typ. < +75 ppm/°C', 5.6, 12.7, 'V3B', 'V3B', 'V3B', '4', '1', '0', '2024-06-12 18:49:20', '0000-00-00 00:00:00'),
(32, '8,9,11,14,18,19,20,21', 4, 'V5B', '32-v5b', '<p>V5B</p>\r\n', 32, 'Axial leaded ', '31,35', '', '0.1Ω', '20KΩ', '±1%, ±2%, ±5%, ±10%', 'Std. < +150 ppm/°C, Typ. < +75 ppm/°C', 7, 23.8, 'V5B', 'V5B', 'V5B', '4', '1', '0', '2024-06-12 18:51:59', '0000-00-00 00:00:00'),
(33, '8,9,11,14,18,19,20,21', 4, 'V7B', '33-v7b', '<p>V7B</p>\r\n', 33, 'Axial leaded', '41,43', '', '0.1Ω', '22KΩ', '±1%, ±2%, ±5%, ±10%', 'Std. < +150 ppm/°C, Typ. < +75 ppm/°C', 8.7, 23.8, 'V7B', 'V7B', 'V7B', '4', '1', '0', '2024-06-12 18:54:41', '0000-00-00 00:00:00'),
(34, '8,9,11,14,18,19,20,21', 4, 'V10B', '34-v10b', '<p>V10B</p>\r\n', 34, 'Axial leaded', '47,51', '', '0.1Ω', '68KΩ', '±1%, ±2%, ±5%, ±10%', 'Std. < +150 ppm/°C, Typ. < +75 ppm/°C', 10, 46.8, 'V10B', 'V10B', 'V10B', '4', '1', '0', '2024-06-18 12:40:38', '0000-00-00 00:00:00'),
(35, '8,9,11,14,18,19,20,21', 4, 'V14B', '35-v14b', '<p>V14B</p>\r\n', 35, 'Axial leaded ', '52,59', '', '0.1Ω', '100KΩ', '±1%, ±2%, ±5%, ±10%', 'Std. < +150 ppm/°C, Typ. < +75 ppm/°C', 8, 53.5, 'V14B', 'V14B', 'V14B', '4', '1', '0', '2024-06-12 18:59:51', '0000-00-00 00:00:00'),
(36, '1,3,4,8,9,10,11,14,16,18,19,22,23,24,25,42', 1, 'P1', '36-p1', '<p>P1</p>\r\n', 37, 'Axial leaded', '9', '', '0.1Ω', '3.3KΩ', '±1%, ±2%, ±5%, ±10%', '±200ppm/°C(Max)', 4, 12, 'P1', 'P1', 'P1', '1', '1', '0', '2024-07-08 14:29:39', '0000-00-00 00:00:00'),
(37, '1,3,4,8,9,10,11,14,16,18,19,22,23,24,25,42', 1, 'P1A', '37-p1a', '<p>P1A</p>\r\n', 37, 'Axial leaded', '12', '', '0.1Ω', '6.8KΩ', '±0.10%, ±0.25%, ±0.50%, ±1%', '±30ppm/°C(Max)', 3.5, 11, 'P1A', 'P1A', 'P1A', '1', '1', '0', '2024-07-08 14:29:51', '0000-00-00 00:00:00'),
(38, '1,3,4,8,9,10,11,14,16,18,19,22,23,24,25,42', 1, 'P1B', '38-p1b', '<p>P1B</p>\r\n', 38, 'Axial leaded', '9', '', '0.1Ω', '2.2KΩ', '±0.10%, ±0.25%, ±0.50%, ±1%, ±2%, ±5% & ±10%', '±30ppm/°C(Max) ±200ppm/°C(Max)', 3, 7, 'P1B', 'P1B', 'P1B', '1', '1', '0', '2024-07-08 14:30:03', '0000-00-00 00:00:00'),
(39, '1,3,4,8,9,10,11,14,16,18,19,22,24,25,42', 1, 'P2', '39-p2', '<p>P2</p>\r\n', 39, 'Axial leaded', '12', '', '0.1Ω', '4.7KΩ', '±1%, ±2%, ±5%, ±10%', '±200ppm/°C(Max)', 5, 12, 'P2', 'P2', 'P2', '1', '1', '0', '2024-07-08 14:31:59', '0000-00-00 00:00:00'),
(40, '1,3,4,8,9,10,11,14,16,18,19,22,23,24,25,42', 1, 'P2A', '40-p2a', '<p>P2A</p>\r\n', 40, 'Axial leaded', '32', '', '0.1Ω', '10KΩ', '±1%, ±2%, ±5%, ±10%', '±200ppm/°C(Max)', 5.6, 13, 'P2A', 'P2A', 'P2A', '1', '1', '0', '2024-07-08 14:31:52', '0000-00-00 00:00:00'),
(41, '1,3,4,8,9,10,11,14,16,18,19,22,23,24,25,42', 1, 'P3', '41-p3', '<p>P3</p>\r\n', 41, 'Axial leaded', '17', '', '0.1Ω', '4.7KΩ', '±1%, ±2%, ±5%, ±10%', '±200ppm/°C(Max)', 6, 17, 'P3', 'P3', 'P3', '1', '1', '0', '2024-07-08 14:31:44', '0000-00-00 00:00:00'),
(42, '1,3,4,8,9,10,11,14,16,18,19,22,23,24,25,42', 1, 'P3A', '42-p3a', '<p>P3A</p>\r\n', 42, 'Axial leaded', '17', '', '0.1Ω', '4.7KΩ', '±0.10%, ±0.25%, ±0.50%, ±1%', '±30ppm/°C(Max)', 5, 12, 'P3A', 'P3A', 'P3A', '1', '1', '0', '2024-07-08 14:31:37', '0000-00-00 00:00:00'),
(43, '1,3,4,8,9,10,11,14,16,18,19,22,23,24,25,42', 1, 'P3C', '43-p3c', '<p>P3C</p>\r\n', 43, 'Axial leaded', '19', '', '0.01Ω', '10KΩ', '±1%, ±2%, ±5%, ±10%', '±200ppm/°C(Max)', 5.6, 14.5, 'P3C', 'P3C', 'P3C', '1', '1', '0', '2024-07-08 14:31:30', '0000-00-00 00:00:00'),
(44, '1,3,4,8,9,10,11,14,16,18,19,22,23,24,25', 1, 'P4', '44-p4', '<p>P4</p>\r\n', 44, 'Axial leaded', '26', '', '0.1Ω', '6.8KΩ', '±1%, ±2%, ±5%, ±10%', '±200ppm/°C(Max)', 7, 17, 'P4', 'P4', 'P4', '1', '1', '0', '2024-07-08 14:31:00', '0000-00-00 00:00:00'),
(45, '1,3,4,8,9,10,11,14,16,18,19,22,23,24,25,42', 1, 'P4B', '45-p4b', '<p>P4B</p>\r\n', 45, 'Axial leaded', '27', '', '0.01Ω', '15KΩ', '±1%, ±2%, ±5%, ±10%', '±200ppm/°C(Max)', 5.6, 16, 'P4B', 'P4B', 'P4B', '1', '1', '0', '2024-07-08 14:30:52', '0000-00-00 00:00:00'),
(46, '1,3,4,8,9,10,11,14,16,18,19,22,23,24,25,42', 1, 'P5', '46-p5', '<p>P5</p>\r\n', 46, 'Axial leaded', '31', '', '0.1Ω', '33KΩ', '±1%, ±2%, ±5%, ±10%', '±200ppm/°C(Max)', 7, 22, 'P5', 'P5', 'P5', '1', '1', '0', '2024-07-08 14:30:45', '0000-00-00 00:00:00'),
(47, '1,3,4,8,9,10,11,14,16,18,19,22,23,24,25,42', 1, 'P5A', '47-p5a', '<p>P5A</p>\r\n', 47, 'Axial leaded', '31', '', '0.1Ω', '39KΩ', '±0.10%, ±0.25%, ±0.50%, ±1%', '±30ppm/°C(Max)', 8, 23, 'P5A', 'P5A', 'P5A', '1', '1', '0', '2024-07-08 14:30:37', '0000-00-00 00:00:00'),
(48, '1,3,4,8,9,10,11,14,16,18,19,22,23,24,25,42', 1, 'P5B', '48-p5b', '<p>P5B</p>\r\n', 47, 'Axial leaded', '34', '', '0.01Ω', '20KΩ', '±1%, ±2%, ±5%, ±10%', '±200ppm/°C(Max)', 7, 18.5, 'P5B', 'P5B', 'P5B', '1', '1', '0', '2024-07-08 14:30:29', '0000-00-00 00:00:00'),
(49, '1,3,4,8,9,10,11,14,16,18,19,22,23,24,25,42', 1, 'P6', '49-p6', '<p>P6</p>\r\n', 49, 'Axial leaded', '37', '', '0.1Ω', '33KΩ', '±1%, ±2%, ±5%, ±10%', '±200ppm/°C(Max)', 8, 23, 'P6', 'P6', 'P6', '1', '1', '0', '2024-07-08 14:34:03', '0000-00-00 00:00:00'),
(50, '1,3,4,8,9,10,11,14,16,18,19,22,23,24,25,42', 1, 'P6A', '50-p6a', '<p>P6A</p>\r\n', 49, 'Axial leaded', '41', '', '0.01Ω', '33KΩ', '±1%, ±2%, ±5%, ±10%', '±200ppm/°C(Max)', 8.8, 26, 'P6A', 'P6A', 'P6A', '1', '1', '0', '2024-07-08 14:33:56', '0000-00-00 00:00:00'),
(51, '1,3,4,8,9,10,11,14,16,18,19,22,23,24,25,42', 1, 'P7', '51-p7', '<p>P7</p>\r\n', 50, 'Axial leaded', '40', '', '0.1Ω', '68KΩ', '±1%, ±2%, ±5%, ±10%', '±200ppm/°C(Max)', 7, 35, 'P7', 'P7', 'P7', '1', '1', '0', '2024-07-08 14:33:47', '0000-00-00 00:00:00'),
(52, '1,3,4,8,9,10,11,14,16,18,19,22,23,24,25,42', 1, 'P9', '52-p9', '<p>P9</p>\r\n', 52, 'Axial leaded', '46', '', '0.1Ω', '68KΩ', '±1%, ±2%, ±5%, ±10%', '±200ppm/°C(Max)', 8, 39, 'P9', 'P9', 'P9', '1', '1', '0', '2024-07-08 14:33:40', '0000-00-00 00:00:00'),
(53, '1,3,4,8,9,10,11,14,16,18,19,22,23,24,25,42', 1, 'P10', '53-p10', '<p>P10</p>\r\n', 53, 'Axial leaded', '48', '', '0.1Ω', '100KΩ', '±1%, ±2%, ±5%, ±10%', '±200ppm/°C(Max)', 7, 50, 'P10', 'P10', 'P10', '1', '1', '0', '2024-07-08 14:33:34', '0000-00-00 00:00:00'),
(54, '1,3,4,8,9,10,11,14,16,18,19,22,23,24,42', 1, 'P10A', '54-p10a', '<p>P10A</p>\r\n', 54, 'Axial leaded', '48', '', '0.1Ω', '100KΩ', '±0.10%, ±0.25%, ±0.50%, ±1%, ±2%, ±5%, ±10%', '±30ppm/°C(Max) ±200ppm/°C(Max)', 8, 45, 'P10A', 'P10A', 'P10A\r\n', '1', '1', '0', '2024-07-08 14:33:09', '0000-00-00 00:00:00'),
(55, '1,3,4,8,9,10,11,14,16,18,19,22,23,24,25,42', 1, 'P10B', '55-p10b', '<p>P10B</p>\r\n', 55, 'Axial leaded', '48', '', '0.1Ω', '100KΩ', '±0.10%, ±0.25%, ±0.50%, ±1%, ±2%, ±5%, ±10%', '±30ppm/°C(Max) ±200ppm/°C(Max)', 9.5, 47, 'P10B', 'P10B', 'P10B', '1', '1', '0', '2024-07-08 14:33:03', '0000-00-00 00:00:00'),
(56, '1,3,4,8,9,10,11,14,16,18,19,22,23,24,42', 1, 'P12', '56-p12', '<p>P12</p>\r\n', 56, 'Axial leaded', '58', '', '0.1Ω', '100KΩ', '±1%, ±2%, ±5%, ±10%', '±200ppm/°C(Max)', 8, 54, 'P12', 'P12', 'P12', '1', '1', '0', '2024-07-08 14:32:57', '0000-00-00 00:00:00'),
(57, '1,3,4,8,9,10,11,14,16,18,19,22,23,24,42', 1, 'P14', '57-p14', '<p>P14</p>\r\n', 57, 'Axial leaded', '66', '', '0.1Ω', '180KΩ', '±1%, ±2%, ±5%, ±10%', '±200ppm/°C(Max)', 9, 50, 'P14', 'P14', 'P14', '1', '1', '0', '2024-07-08 14:32:51', '0000-00-00 00:00:00'),
(58, '8,9,10,16,18,19', 12, 'C2', '58-c2', '<p>C2</p>\r\n', 58, 'Axial leaded', '14', '', '0.05Ω', '3.9KΩ', '≤10Ω  ±10%, >10Ω ±5%; On request  ±2%', 'Std:<150ppm/°C; On Request: 50ppm/°C, 20ppm/°C', 6.4, 15, 'C2', 'C2', 'C2', '12', '1', '0', '2024-06-13 11:56:49', '0000-00-00 00:00:00'),
(59, '8,9,10,16,18,19', 12, 'C4', '59-c4', '<p>C4</p>\r\n', 59, 'Axial leaded', '28', '', '0.1Ω', '6.8KΩ', '≤10Ω  ±10%, >10Ω ±5%; On request  ±2%', 'Std:<150ppm/°C; On Request: 50ppm/°C, 20ppm/°C', 6.4, 20, 'C4', 'C4', 'C4', '12', '1', '0', '2024-06-13 12:05:26', '0000-00-00 00:00:00'),
(60, '8,9,10,16,18,19', 12, 'C5', '60-c5', '<p>C5</p>\r\n', 60, 'Axial leaded', '36', '', '0.33Ω', '10KΩ', '≤10Ω  ±10%, >10Ω ±5%; On request  ±2%', 'Std:<150ppm/°C; On Request: 50ppm/°C, 20ppm/°C', 6.4, 25, 'C5', 'C5', 'C5\r\n', '12', '1', '0', '2024-06-13 12:20:02', '0000-00-00 00:00:00'),
(61, '8,9,10,16,18,19', 12, 'C7', '61-c7', '<p>C7</p>\r\n', 61, 'Axial leaded', '42', '', '0.47Ω', '22KΩ', '≤10Ω  ±10%, >10Ω ±5%; On request  ±2%', 'Std:<150ppm/°C; On Request: 50ppm/°C, 20ppm/°C', 6.4, 38, 'C7', 'C7', 'C7', '12', '1', '0', '2024-06-13 12:23:28', '0000-00-00 00:00:00'),
(62, '8,9,10,16,18,19', 12, 'C7A', '62-c7a', '<p>C7A</p>\r\n', 62, 'Axial leaded', '42', '', '0.33Ω', '10KΩ', '≤10Ω  ±10%, >10Ω ±5%; On request  ±2%', 'Std:<150ppm/°C; On Request: 50ppm/°C, 20ppm/°C', 9, 25, 'C7A', 'C7A', 'C7A', '12', '1', '0', '2024-06-13 12:25:34', '0000-00-00 00:00:00'),
(63, '8,9,10,16,18,19', 12, 'C9', '63-c9', '<p>C9</p>\r\n', 63, 'Axial leaded', '47', '', '0.47Ω', '22KΩ', '≤10Ω  ±10%, >10Ω ±5%; On request  ±2%', 'Std:<150ppm/°C; On Request: 50ppm/°C, 20ppm/°C', 9, 38, 'C9', 'C9', 'C9', '12', '1', '0', '2024-06-13 12:27:25', '0000-00-00 00:00:00'),
(64, '8,9,10,16,18,19', 12, 'C11', '64-c11', '<p>C11</p>\r\n', 64, 'Axial leaded', '57', '', '0.82Ω', '22KΩ', '≤10Ω  ±10%, >10Ω ±5%; On request  ±2%', 'Std:<150ppm/°C; On Request: 50ppm/°C, 20ppm/°C', 9, 50, 'C11', 'C11', 'C11', '12', '1', '0', '2024-06-13 12:29:07', '0000-00-00 00:00:00'),
(65, '8,9,10,16,18,19', 12, 'C17', '65-c17', '<p>C17</p>\r\n', 65, 'Axial leaded', '73', '', '1.5Ω', '27KΩ', '≤10Ω  ±10%, >10Ω ±5%; On request  ±2%', 'Std:<150ppm/°C; On Request: 50ppm/°C, 20ppm/°C', 9, 75, 'C17', 'C17', 'C17', '12', '1', '0', '2024-06-13 12:31:00', '0000-00-00 00:00:00'),
(66, '3,8,9,10,16,18,19', 13, 'BA2', '66-ba2', '<p>BA2</p>\r\n', 66, 'Axial leaded', '13', '', '0.10Ω', '2.7KΩ', '±1%, ±2%, ±5%, ±10%', '<450ppm/°C  for low values, Other values :  Std. < +150ppm/°C, On request 20ppm/°C', 7, 18, 'BA2', 'BA2', 'BA2', '13', '1', '0', '2024-07-08 16:45:12', '0000-00-00 00:00:00'),
(67, '3,8,9,10,16,18,19', 13, 'BA3', '67-ba3', '<p>BA3</p>\r\n', 67, 'Axial leaded', '19', '', '0.10Ω', '2.7KΩ', '±1%, ±2%, ±5%, ±10%', '<450ppm/°C  for low values, Other values :  Std. < +150ppm/°C, On request 20ppm/°C', 8, 22, 'BA3', 'BA3', 'BA3', '13', '1', '0', '2024-07-08 16:45:07', '0000-00-00 00:00:00'),
(68, '3,8,9,10,16,18,19', 13, 'BA5', '68-ba5', '<p>BA5</p>\r\n', 68, 'Axial leaded', '34', '', '0.10Ω', '2.7KΩ', '±1%, ±2%, ±5%, ±10%', '<450ppm/°C  for low values, Other values :  Std. < +150ppm/°C, On request 20ppm/°C', 9.5, 22, 'BA5', 'BA5', 'BA5', '13', '1', '0', '2024-07-08 16:44:50', '0000-00-00 00:00:00'),
(69, '3,8,9,10,16,18,19', 13, 'BA7', '69-ba7', '<p>BA7</p>\r\n', 69, 'Axial leaded', '41', '', '0.10Ω', '10KΩ', '±1%, ±2%, ±5%, ±10%', '<450ppm/°C  for low values, Other values :  Std. < +150ppm/°C, On request 20ppm/°C', 9.5, 35, 'BA7', 'BA7', 'BA7', '13', '1', '0', '2024-07-08 16:44:45', '0000-00-00 00:00:00'),
(70, '3,8,9,10,16,18,19', 13, 'BA10', '70-ba10', '<p>BA10</p>\r\n', 70, 'Axial leaded', '51', '', '0.22Ω', '10KΩ', '±1%, ±2%, ±5%, ±10%', '<450ppm/°C  for low values, Other values :  Std. < +150ppm/°C, On request 20ppm/°C', 9.5, 48, 'BA10', 'BA10', 'BA10', '13', '1', '0', '2024-07-08 16:44:41', '0000-00-00 00:00:00'),
(71, '3,8,9,10,16,18,19', 13, 'BA15', '71-ba15', '<p>BA15</p>\r\n', 71, 'Axial leaded', '71', '', '0.22Ω', '10KΩ', '±1%, ±2%, ±5%, ±10%', '<450ppm/°C  for low values, Other values :  Std. < +150ppm/°C, On request 20ppm/°C', 12.5, 48, 'BA15', 'BA15', 'BA15', '13', '1', '0', '2024-07-08 16:44:36', '0000-00-00 00:00:00'),
(72, '3,8,9,10,16,18,19', 13, 'BA20', '72-ba20', '<p>BA20</p>\r\n', 72, 'Axial leaded', '76', '', '0.33Ω', '15KΩ', '±1%, ±2%, ±5%, ±10%', '<450ppm/°C  for low values, Other values :  Std. < +150ppm/°C, On request 20ppm/°C', 12.5, 60, 'BA20', 'BA20', 'BA20', '13', '1', '0', '2024-07-08 16:44:29', '0000-00-00 00:00:00'),
(73, '3,23,25', 14, 'EM2', '73-em2', '<p>EM2</p>\r\n', 72, 'Axial leaded', '13', '', '3.9Ω', '2KΩ', '±2%, ±5%, ±10%', '±200ppm/°C(Max)', 5, 12, 'EM2', 'EM2', 'EM2', '14', '1', '0', '2024-06-13 13:06:46', '0000-00-00 00:00:00'),
(74, '3,23,25', 14, 'EM3', '74-em3', '<p>EM3</p>\r\n', 74, 'Axial leaded', '19', '', '3.9Ω', '2.7KΩ', '±2%, ±5%, ±10%', '±200ppm/°C(Max)', 5.5, 14.5, 'EM3', 'EM3', 'EM3', '14', '1', '0', '2024-06-13 13:09:02', '0000-00-00 00:00:00'),
(75, '3,23,25', 14, 'EM4', '75-em4', '<p>EM4</p>\r\n', 74, 'Axial leaded', '27', '', '2.7Ω', '3.3KΩ', '±2%, ±5%, ±10%', '±200ppm/°C(Max)', 5.5, 17, 'EM4', 'EM4', 'EM4', '14', '1', '0', '2024-06-13 13:10:47', '0000-00-00 00:00:00'),
(76, '3,23,25', 14, 'EM5', '76-em5', '<p>EM5</p>\r\n', 75, 'Axial leaded', '34', '', '1.8Ω', '4.7KΩ', '±2%, ±5%, ±10%', '±200ppm/°C(Max)', 7, 19, 'EM5', 'EM5', 'EM5', '14', '1', '0', '2024-06-13 13:12:40', '0000-00-00 00:00:00'),
(77, '3,23,25', 14, 'EM6', '77-em6', '<p>EM6</p>\r\n', 76, 'Axial leaded', '38', '', '1.8Ω', '6.8KΩ', '±2%, ±5%, ±10%', '±200ppm/°C(Max)', 8, 23, 'EM6', 'EM6', 'EM6', '14', '1', '0', '2024-06-13 13:20:05', '0000-00-00 00:00:00'),
(78, '3,23,25', 14, 'EM7', '78-em7', '<p>EM7</p>\r\n', 76, 'Axial leaded', '41', '', '1Ω', '7.5KΩ', '±2%, ±5%, ±10%', '±200ppm/°C(Max)', 8, 26, 'EM7', 'EM7', 'EM7', '14', '1', '0', '2024-06-13 13:23:03', '0000-00-00 00:00:00'),
(79, '3,23,25', 14, 'EM9', '79-em9', '<p>EM9</p>\r\n', 77, 'Axial leaded ', '51', '', '1Ω', '10KΩ', '±2%, ±5%, ±10%', '±200ppm/°C(Max)', 8, 39, 'EM9', 'EM9', 'EM9', '14', '1', '0', '2024-06-13 13:25:05', '0000-00-00 00:00:00'),
(80, '3,8,9,10,16,18,19', 2, 'M101/M101D', '80-m101-m101d', '<p>M101/M101D</p>\r\n', 80, 'Axial Leaded -  Vertical Mounting,  Horizontal Mounting', '28', '', '0.1Ω', '6.8KΩ', 'Std. ≤10Ω ±10%, >10Ω ±5%, On request ±2%', 'Low Values : 450ppm/°C(Max);  Mid & High  Values, Std.:  <150ppm/°C ;   On Request: 50ppm/°C, 20ppm/°C', 7, 20, 'M101/M101D', 'M101/M101D', 'M101/M101D', '2', '1', '0', '2024-07-08 16:46:33', '0000-00-00 00:00:00'),
(81, '3,8,9,10,16,18,19', 2, 'M102/M102D', '81-m102-m102d', '<p>M102/M102D</p>\r\n', 81, 'Axial Leaded -  Vertical Mounting,  Horizontal Mounting', '36', '', '0.33Ω', '10KΩ', 'Std. ≤10Ω ±10%, >10Ω ±5%, On request ±2%', 'Low Values : 450ppm/°C(Max);  Mid & High  Values, Std.:  <150ppm/°C ;   On Request: 50ppm/°C, 20ppm/°C', 7, 25, 'M102/M102D', 'M102/M102D', 'M102/M102D', '2', '1', '0', '2024-07-08 16:46:27', '0000-00-00 00:00:00'),
(82, '3,8,9,10,16,18,19', 2, 'M103/M103D', '82-m103-m103d', '<p>M103/M103D</p>\r\n', 83, 'Axial Leaded -  Vertical Mounting,  Horizontal Mounting', '42', '', '0.47Ω', '22KΩ', 'Std. ≤10Ω ±10%, >10Ω ±5%, On request ±2%', 'Low Values : 450ppm/°C(Max);  Mid & High  Values, Std.:  <150ppm/°C ;   On Request: 50ppm/°C, 20ppm/°C', 7, 38, 'M103/M103D', 'M103/M103D', 'M103/M103D', '2', '1', '0', '2024-07-08 16:46:20', '0000-00-00 00:00:00'),
(83, '3,8,9,10,16,18', 2, 'M104/M104D', '83-m104-m104d', '<p>M104/M104D</p>\r\n', 84, 'Axial Leaded -  Vertical Mounting,  Horizontal Mounting', '42', '', '0.33Ω', '10KΩ', 'Std. ≤10Ω ±10%, >10Ω ±5%, On request ±2%', 'Low Values : 450ppm/°C(Max);  Mid & High  Values, Std.:  <150ppm/°C ;   On Request: 50ppm/°C, 20ppm/°C', 9, 25, 'M104/M104D', 'M104/M104D', 'M104/M104D', '2', '1', '0', '2024-07-08 16:46:15', '0000-00-00 00:00:00'),
(84, '3,8,9,10,16,18', 2, 'M105/M105D', '84-m105-m105d', '<p>M105/M105D</p>\r\n', 84, 'Axial Leaded -  Vertical Mounting,  Horizontal Mounting', '47', '', '0.47Ω', '22KΩ', 'Std. ≤10Ω ±10%, >10Ω ±5%, On request ±2%', 'Low Values : 450ppm/°C(Max);  Mid & High  Values, Std.:  <150ppm/°C ;   On Request: 50ppm/°C, 20ppm/°C', 9, 38, 'M105/M105D', 'M105/M105D', 'M105/M105D\r\n', '2', '1', '0', '2024-07-08 16:46:12', '0000-00-00 00:00:00'),
(85, '3,8,9,10,16,18,19', 2, 'M106/M106D', '85-m106-m106d', '<p>M106/M106D</p>\r\n', 85, 'Axial Leaded -  Vertical Mounting,  Horizontal Mounting', '57', '', '0.82Ω', '22KΩ', 'Std. ≤10Ω ±10%, >10Ω ±5%, On request ±2%', 'Low Values : 450ppm/°C(Max);  Mid & High  Values, Std.:  <150ppm/°C ;   On Request: 50ppm/°C, 20ppm/°C', 9, 50, 'M106/M106D', 'M106/M106D', 'M106/M106D', '2', '1', '0', '2024-07-08 16:46:07', '0000-00-00 00:00:00'),
(86, '3,8,9,10,16,18,19', 2, 'M107/M107D', '86-m107-m107d', '<p>M107/M107D</p>\r\n', 86, 'Axial Leaded -  Vertical Mounting,  Horizontal Mounting', '73', '', '1.5Ω', '27KΩ', 'Std. ≤10Ω ±10%, >10Ω ±5%, On request ±2%', 'Low Values : 450ppm/°C(Max);  Mid & High  Values, Std.:  <150ppm/°C ;   On Request: 50ppm/°C, 20ppm/°C', 9, 75, 'M107/M107D', 'M107/M107D', 'M107/M107D', '2', '1', '0', '2024-07-08 16:46:02', '0000-00-00 00:00:00'),
(87, '8,9,10,16,18,19', 15, 'M101A', '87-m101a', '<p>M101A</p>\r\n', 87, 'Axial Leaded', '28', '', '0.1Ω', '6.8KΩ', 'Std. ≤10Ω ±10%, >10Ω ±5%, On request ±2%', 'Low Values : 450ppm/°C(Max);  Mid & High  Values, Std.:  <150ppm/°C ;   On Request: 50ppm/°C, 20ppm/°C', 7, 20, 'M101A', 'M101A', 'M101A', '15', '1', '0', '2024-06-13 15:38:38', '0000-00-00 00:00:00'),
(88, '3,16,18,19,26', 6, 'GR3', '88-gr3', '<p>GR3</p>\r\n', 100, 'Radial PCB Terminal', '28', '', '100Ω', '5.6KΩ', ' ±5%, ±10%', '±20ppm/°C', 6, 25.3, 'GR3', 'GR3', 'GR3', '6', '1', '0', '2024-07-08 16:42:06', '0000-00-00 00:00:00'),
(89, '16,18', 16, 'G5', '89-g5', '<p>G5</p>\r\n', 121, 'Axial Leaded', '31', '', '110Ω', '7.5KΩ', '>1Ω - ±10%, ≤1Ω - ±10%, ±0.05Ω,  ±5% Available in all values on request', '±30ppm/°C', 6, 30, 'G5', 'G5', 'G5', '16', '1', '0', '2024-06-13 16:27:10', '0000-00-00 00:00:00'),
(90, '16,18', 16, 'G7', '90-g7', '<p>G7</p>\r\n', 122, 'Axial Leaded', '40', '', '1Ω', '2Ω', '>1Ω - ±10%, ≤1Ω - ±10%, ±0.05Ω,  ±5% Available in all values on request', '400 ±50ppm/°C', 6, 35, 'G7', 'G7', 'G7', '16', '1', '0', '2024-06-13 16:41:07', '0000-00-00 00:00:00'),
(91, '3,16,18,19,26', 6, 'GR5', '91-gr5', '<p>GR5</p>\r\n', 101, 'Radial PCB Terminal', '36', '', '0.47Ω', '0.56Ω', ' ±5%, ±10%', '400 ±50ppm/°C', 6, 35.4, 'GR5', 'GR5', 'GR5', '6', '1', '0', '2024-07-08 16:42:02', '0000-00-00 00:00:00'),
(92, '3,16,18,19,26', 6, 'GR5', '92-gr5', '<p>GR5</p>\r\n', 102, 'Radial PCB Terminal', '36', '', '0.68Ω', '120Ω', ' ±5%, ±10%', '0+40 -80ppm/°C', 6, 35.4, 'GR5', 'GR5', 'GR5', '6', '1', '0', '2024-07-08 16:41:58', '0000-00-00 00:00:00'),
(93, '16,18', 16, 'G7', '93-g7', '<p>G7</p>\r\n', 123, 'Axial Leaded', '40', '', '2.2Ω', '150Ω', '>1Ω - ±10%, ≤1Ω - ±10%, ±0.05Ω,  ±5% Available in all values on request', '0+40 -80ppm/°C', 6, 35, 'G7', 'G7', 'G7', '16', '1', '0', '2024-06-13 16:40:36', '0000-00-00 00:00:00'),
(94, '3', 6, 'GR5', '94-gr5', '<p>GR5</p>\r\n', 103, 'Radial PCB Terminal', '36', '', '150Ω', '15KΩ', ' ±5%, ±10%', '±20ppm/°C', 6, 35.4, 'GR5', 'GR5', 'GR5', '6', '1', '0', '2024-07-08 16:41:53', '0000-00-00 00:00:00'),
(95, '8,9,10,16,18,19', 15, 'M102A', '95-m102a', '<p>M102AM102A</p>\r\n', 88, 'Axial Leaded', '36', '', '0.33Ω', '10KΩ', 'Std. ≤10Ω ±10%, >10Ω ±5%, On request ±2%', 'Low Values : 450ppm/°C(Max);  Mid & High  Values, Std.:  <150ppm/°C ;   On Request: 50ppm/°C, 20ppm/°C', 7, 25, 'M102A', 'M102A', 'M102A', '15', '1', '0', '2024-06-13 16:58:40', '0000-00-00 00:00:00'),
(96, '16,18', 16, 'G7', '96-g7', '<p>G7</p>\r\n', 124, 'Axial Leaded', '40', '', '180Ω', '10KΩ', '>1Ω - ±10%, ≤1Ω - ±10%, ±0.05Ω,  ±5% Available in all values on request', '±30ppm/°C', 6, 35, 'G7', 'G7', 'G7', '16', '1', '0', '2024-06-13 16:46:57', '0000-00-00 00:00:00'),
(97, '3,16,18,19,26', 6, 'GR7', '97-gr7', '<p>GR7</p>\r\n', 104, 'Radial PCB Terminal', '39', '', '0.68Ω', '0.91Ω', ' ±5%, ±10%', '400 ±50ppm/°C', 6, 45.5, 'GR7', 'GR7', 'GR7', '6', '1', '0', '2024-07-08 16:41:50', '0000-00-00 00:00:00'),
(98, '16,18', 16, 'G9', '98-g9', '<p>G9</p>\r\n', 125, 'Axial Leaded', '46', '', '2Ω', '4.7Ω', '>1Ω - ±10%, ≤1Ω - ±10%, ±0.05Ω,  ±5% Available in all values on request', '400 ±50ppm/°C', 6, 50, 'G9', 'G9', 'G9', '16', '1', '0', '2024-06-13 16:51:18', '0000-00-00 00:00:00'),
(99, '3,16,18,19,26', 6, 'GR7', '99-gr7', '<p>GR7</p>\r\n', 105, 'Radial PCB Terminal', '39', '', '1.0Ω', '220Ω', ' ±5%, ±10%', '0+40 -80ppm/°C', 6, 45.5, 'GR7', 'GR7', 'GR7', '6', '1', '0', '2024-07-08 16:43:00', '0000-00-00 00:00:00'),
(100, '3,16,18,19,26', 6, 'GR7', '100-gr7', '<p>GR7</p>\r\n', 106, 'Radial PCB Terminal', '39', '', '240Ω', '20KΩ', ' ±5%, ±10%', '±20ppm/°C', 6, 45.5, 'GR7', 'GR7', 'GR7', '6', '1', '0', '2024-07-08 16:43:04', '0000-00-00 00:00:00'),
(101, '16,18', 16, 'G9', '101-g9', '<p>G9</p>\r\n', 126, 'Axial Leaded', '46', '', '5.1Ω', '200Ω', '>1Ω - ±10%, ≤1Ω - ±10%, ±0.05Ω,  ±5% Available in all values on request', '0+40 -80ppm/°C', 6, 50, 'G9', 'G9', 'G9', '16', '1', '0', '2024-06-13 16:57:17', '0000-00-00 00:00:00'),
(102, '16,18', 16, 'G9', '102-g9', '<p>G9</p>\r\n', 127, 'Axial Leaded', '46', '', '220Ω', '12KΩ', '>1Ω - ±10%, ≤1Ω - ±10%, ±0.05Ω,  ±5% Available in all values on request', '±30ppm/°C', 6, 50, 'G9', 'G9', 'G9', '16', '1', '0', '2024-06-13 17:00:51', '0000-00-00 00:00:00'),
(103, '8,9,10,16,18,19', 15, 'M103A', '103-m103a', '<p>M103A</p>\r\n', 89, 'Axial Leaded', '42', '', '0.47Ω', '22KΩ', 'Std. ≤10Ω ±10%, >10Ω ±5%, On request ±2%', 'Low Values : 450ppm/°C(Max);  Mid & High  Values, Std.:  <150ppm/°C ;   On Request: 50ppm/°C, 20ppm/°C', 7, 38, 'M103A', 'M103A', 'M103A', '15', '1', '0', '2024-06-13 17:00:57', '0000-00-00 00:00:00'),
(104, '8,9,10,16,18,19', 15, 'M104A', '104-m104a', '<p>M104A</p>\r\n', 90, 'Axial Leaded', '42', '', '0.33Ω', '10KΩ', 'Std. ≤10Ω ±10%, >10Ω ±5%, On request ±2%', 'Low Values : 450ppm/°C(Max);  Mid & High  Values, Std.:  <150ppm/°C ;   On Request: 50ppm/°C, 20ppm/°C', 9, 25, 'M104A', 'M104A', 'M104A', '15', '1', '0', '2024-06-13 17:03:38', '0000-00-00 00:00:00'),
(105, '3,16,18,19,26', 6, 'GR9', '105-gr9', '<p>GR9</p>\r\n', 107, 'Radial PCB Terminal', '45', '', '0.91Ω', '1.2Ω', ' ±5%, ±10%', '400 ±50ppm/°C', 6, 55.7, 'GR9', 'GR9', 'GR9', '6', '1', '0', '2024-07-08 16:43:09', '0000-00-00 00:00:00'),
(106, '8,9,10,16,18,19', 15, 'M105A', '106-m105a', '<p>M105A</p>\r\n', 91, 'Axial Leaded', '47', '', '0.47Ω', '22KΩ', 'Std. ≤10Ω ±10%, >10Ω ±5%, On request ±2%', 'Low Values : 450ppm/°C(Max);  Mid & High  Values, Std.:  <150ppm/°C ;   On Request: 50ppm/°C, 20ppm/°C', 9, 38, 'M105A', 'M105A', 'M105A', '15', '1', '0', '2024-06-13 17:06:11', '0000-00-00 00:00:00'),
(107, '3,16,18,19,26', 6, 'GR9', '107-gr9', '<p>GR9</p>\r\n', 108, 'Radial PCB Terminal', '45', '', '1.3Ω', '250Ω', ' ±5%, ±10%', '0+40 -80ppm/°C', 6, 55.7, 'GR9', 'GR9', 'GR9', '6', '1', '0', '2024-07-08 16:43:13', '0000-00-00 00:00:00'),
(108, '1,3,16,18,26', 17, 'BR5', '108-br5', '<p>BR5</p>\r\n', 129, 'Radial PCB Terminal', '31', '', '0.1Ω', '300Ω', '>1Ω - ±10%, ≤1Ω - ±10%, ±0.05Ω,  ±5% Available in all values on request', '<±200ppm/°C, Higher TCR Wires may be used in  Ratings  upto 15W', 9.5, 22, 'BR5', 'BR5', 'BR5', '17', '1', '0', '2024-07-08 16:41:03', '0000-00-00 00:00:00'),
(109, '8,9,10,16,18,19', 15, 'M106A', '109-m106a', '<p>M106A</p>\r\n', 91, 'Axial Leaded', '57', '', '0.82Ω', '22KΩ', 'Std. ≤10Ω ±10%, >10Ω ±5%, On request ±2%', 'Low Values : 450ppm/°C(Max);  Mid & High  Values, Std.:  <150ppm/°C ;   On Request: 50ppm/°C, 20ppm/°C', 9, 50, 'M106A', 'M106A', 'M106A', '15', '1', '0', '2024-06-13 17:11:15', '0000-00-00 00:00:00'),
(110, '8,9,10,16,18,19', 15, 'M107A', '110-m107a', '<p>M107A</p>\r\n', 92, 'Axial Leaded', '73', '', '1.5Ω', '27KΩ', 'Std. ≤10Ω ±10%, >10Ω ±5%, On request ±2%', 'Low Values : 450ppm/°C(Max);  Mid & High  Values, Std.:  <150ppm/°C ;   On Request: 50ppm/°C, 20ppm/°C', 9, 75, 'M107A', 'M107A', 'M107A', '15', '1', '0', '2024-06-13 17:13:32', '0000-00-00 00:00:00'),
(111, '3,16,18,19,26', 6, 'GR9', '111-gr9', '<p>GR9</p>\r\n', 109, 'Radial PCB Terminal', '45', '', '270Ω', '22KΩ', ' ±5%, ±10%', '±20ppm/°C', 6, 55.7, 'GR9', 'GR9', 'GR9', '6', '1', '0', '2024-07-08 16:43:18', '0000-00-00 00:00:00'),
(112, '1,3,16,18,26', 17, 'BR3', '112-br3', '<p>BR3</p>\r\n', 128, 'Radial PCB Terminal', '17', '', '0.1Ω', '300Ω', '>1Ω - ±10%, ≤1Ω - ±10%, ±0.05Ω,  ±5% Available in all values on request', '<±200ppm/°C, Higher TCR Wires may be used in  Ratings  upto 15W', 8, 22, 'BR3', 'BR3', 'BR3', '17', '1', '0', '2024-07-08 16:40:58', '0000-00-00 00:00:00'),
(113, '1,3,16,18,26', 17, 'BR7', '113-br7', '<p>BR7</p>\r\n', 130, 'Radial PCB Terminal', '40', '', '0.5Ω', '500Ω', '>1Ω - ±10%, ≤1Ω - ±10%, ±0.05Ω,  ±5% Available in all values on request', '<±200ppm/°C, Higher TCR Wires may be used in  Ratings  upto 15W', 9.5, 35, 'BR7', 'BR7', 'BR7', '17', '1', '0', '2024-07-08 16:40:53', '0000-00-00 00:00:00'),
(114, '16,18', 16, 'G1', '114-g1', '<p>G1</p>\r\n', 110, 'Axial Leaded', '9', '', '0.33Ω', '0.91Ω', '', '0.33Ω-0.91Ω    : 400 ±50ppm/°C <br>\r\n     1Ω-30Ω       : +40 to -80ppm/°C <br>\r\n 33Ω-1.8KΩ      :  ±30ppm/°C \r\n', 5, 15, 'G1', 'G1', 'G1', '16', '1', '0', '2024-09-02 13:15:03', '0000-00-00 00:00:00'),
(115, '1,3,16,18,26', 17, 'BR10', '115-br10', '<p>BR10</p>\r\n', 131, 'Radial PCB Terminal', '48', '', '0.5Ω', '680Ω', '>1Ω - ±10%, ≤1Ω - ±10%, ±0.05Ω,  ±5% Available in all values on request', '<±200ppm/°C, Higher TCR Wires may be used in  Ratings  upto 15W', 9.5, 48, 'BR10', 'BR10', 'BR10', '17', '1', '0', '2024-07-08 16:40:48', '0000-00-00 00:00:00'),
(116, '16,18', 16, 'G1', '116-g1', '<p>G1</p>\r\n', 111, 'Axial Leaded', '9', '', '1Ω', '30Ω', '1Ω - ±10%, ≤1Ω - ±10%, ±0.05Ω, ±5% Available in all values on request', '0+40 -80ppm/°C', 5, 15, 'G1', 'G1', 'G1', '16', '1', '0', '2024-09-02 13:10:59', '0000-00-00 00:00:00'),
(117, '3,16,18,19,26', 6, 'GR2', '117-gr2', '<p>GR2</p>\r\n', 93, 'Radial PCB Terminal', '14', '', '0.20Ω', '0.30Ω', ' ±5%, ±10%', '400 ±50ppm/°C', 6, 20.2, 'GR2', 'GR2', 'GR2', '6', '1', '0', '2024-07-08 16:43:22', '0000-00-00 00:00:00'),
(118, '3,16,18,19,26', 6, 'GR2', '118-gr2', '<p>GR2</p>\r\n', 94, 'Radial PCB Terminal', '14', '', '0.33Ω', '47Ω', ' ±5%, ±10%', '0+40 -80ppm/°C', 6, 20.2, 'GR2', 'GR2', 'GR2', '6', '1', '0', '2024-07-08 16:43:26', '0000-00-00 00:00:00'),
(119, '1,3,16,18,26', 17, 'BR15', '119-br15', '<p>BR15</p>\r\n', 132, 'Radial PCB Terminal', '70', '', '0.5Ω', '2.0KΩ', '>1Ω - ±10%, ≤1Ω - ±10%, ±0.05Ω,  ±5% Available in all values on request', '<±200ppm/°C, Higher TCR Wires may be used in  Ratings  upto 15W', 14, 48, 'BR15', 'BR15', 'BR15', '17', '1', '0', '2024-07-08 16:40:44', '0000-00-00 00:00:00'),
(120, '16,18', 16, 'G1', '120-g1', '<p>G1</p>\r\n', 112, 'Axial Leaded', '9', '', '33Ω', '1.8KΩ', '\">1Ω - ±10%, ≤1Ω - ±10%, ±0.05Ω,  ±5% Available in all values on request\"', '±30ppm/°C', 5, 15, 'G1', 'G1', 'G1', '16', '1', '0', '2024-06-13 17:46:29', '0000-00-00 00:00:00'),
(121, '3,16,18,19,26', 6, 'GR2', '121-gr2', '<p>GR2</p>\r\n', 94, 'Radial PCB Terminal', '14', '', '56Ω', '3.9KΩ', ' ±5%, ±10%', '±20ppm/°C', 6, 20.2, 'GR2', 'GR2', 'GR2', '6', '1', '0', '2024-07-08 16:43:38', '0000-00-00 00:00:00'),
(122, '1,3,16,18,26', 17, 'BR20 ', '122-br20', '<p>BR20</p>\r\n', 133, 'Radial PCB Terminal', '74', '', '1.0Ω', '3.0KΩ', '>1Ω - ±10%, ≤1Ω - ±10%, ±0.05Ω,  ±5% Available in all values on request', '<±200ppm/°C, Higher TCR Wires may be used in  Ratings  upto 15W', 14, 63.5, 'BR20 ', 'BR20 ', 'BR20 ', '17', '1', '0', '2024-07-08 16:40:38', '0000-00-00 00:00:00'),
(123, '16,18', 16, 'G2', '123-g2', '<p>G2</p>\r\n', 113, 'Axial Leaded', '12', '', '0.51Ω', '1.5Ω', '\">1Ω - ±10%, ≤1Ω - ±10%, ±0.05Ω,  ±5% Available in all values on request\"', '400 ±50ppm/°C', 5, 23, 'G2', 'G2', 'G2', '16', '1', '0', '2024-06-13 17:49:05', '0000-00-00 00:00:00'),
(124, '3,16,18,19,26', 6, 'GR3', '124-gr3', '<p>GR3</p>\r\n', 95, 'Radial PCB Terminal', '28', '', '0.30Ω', '0.39Ω', ' ±5%, ±10%', '400 ±50ppm/°C', 6, 25.3, 'GR3', 'GR3', 'GR3', '6', '1', '0', '2024-07-08 16:43:34', '0000-00-00 00:00:00'),
(125, '3,16,18,19,26', 6, 'GR3', '125-gr3', '<p>GR3</p>\r\n', 96, 'Radial PCB Terminal', '28', '', '0.47Ω', '82Ω', ' ±5%, ±10%', '0+40 -80ppm/°C', 6, 25.3, 'GR3', 'GR3', 'GR3', '6', '1', '0', '2024-07-08 16:43:30', '0000-00-00 00:00:00'),
(126, '16,18', 16, 'G2', '126-g2', '<p>G2</p>\r\n', 114, 'Axial Leaded', '12', '', '1.8Ω', '47Ω', '\">1Ω - ±10%, ≤1Ω - ±10%, ±0.05Ω,  ±5% Available in all values on request\"', '0+40 -80ppm/°C', 5, 23, 'G2', 'G2', 'G2', '16', '1', '0', '2024-06-13 17:52:27', '0000-00-00 00:00:00'),
(127, '16,18', 16, 'G2', '127-g2', '<p>G2</p>\r\n', 115, 'Axial Leaded', '12', '', '51Ω', '3.9KΩ', '\">1Ω - ±10%, ≤1Ω - ±10%, ±0.05Ω,  ±5% Available in all values on request\"', '±30ppm/°C', 5, 23, 'G2', 'G2', 'G2', '16', '1', '0', '2024-06-13 17:55:26', '0000-00-00 00:00:00'),
(128, '1,3,16,18,26', 17, 'BR25', '128-br25', '<p>BR25</p>\r\n', 134, 'Radial PCB Terminal', '77', '', '1.0Ω', '3.6KΩ', '>1Ω - ±10%, ≤1Ω - ±10%, ±0.05Ω,  ±5% Available in all values on request', '<±200ppm/°C, Higher TCR Wires may be used in  Ratings  upto 15W', 16, 63.5, 'BR25', 'BR25', 'BR25', '17', '1', '0', '2024-07-08 16:40:33', '0000-00-00 00:00:00'),
(129, '16,18', 16, 'G3', '129-g3', '<p>G3</p>\r\n', 116, 'Axial Leaded', '17', '', '0.33Ω', '0.91Ω', '\">1Ω - ±10%, ≤1Ω - ±10%, ±0.05Ω,  ±5% Available in all values on request\"', '400 ±50ppm/°C', 6, 23, 'G3', 'G3', 'G3', '16', '1', '0', '2024-06-13 17:57:42', '0000-00-00 00:00:00'),
(130, '1,3,16,18,26', 17, 'BR30 ', '130-br30', '<p>BR30</p>\r\n', 135, 'Radial PCB Terminal', '79', '', '1.0Ω', '4.3KΩ', '>1Ω - ±10%, ≤1Ω - ±10%, ±0.05Ω,  ±5% Available in all values on request', '< ±200ppm/°C, Higher TCR Wires may be used in  Ratings  upto 15W', 19, 75, 'BR30 ', 'BR30 ', 'BR30 ', '17', '1', '0', '2024-07-08 16:40:29', '0000-00-00 00:00:00'),
(131, '16,18', 16, 'G3', '131-g3', '<p>G3</p>\r\n', 117, 'Axial Leaded', '17', '', '1Ω', '68Ω', '>1Ω - ±10%, ≤1Ω - ±10%, ±0.05Ω,  ±5% Available in all values on request', '0+40 -80ppm/°C', 6, 23, 'G3', 'G3', 'G3', '16', '1', '0', '2024-06-14 17:09:19', '0000-00-00 00:00:00'),
(132, '1,3,16,18,26', 17, 'BR40', '132-br40', '<p>BR40</p>\r\n', 136, 'Radial PCB Terminal', '82', '', '1.8Ω', '5.6KΩ', '>1Ω - ±10%, ≤1Ω - ±10%, ±0.05Ω,  ±5% Available in all values on request', '<±200ppm/°C, Higher TCR Wires may be used in  Ratings  upto 15W', 19, 90, 'BR40', 'BR40', 'BR40', '17', '1', '0', '2024-07-08 16:40:25', '0000-00-00 00:00:00'),
(133, '9,10', 5, 'PYP8', '133-pyp8', '<p>PYP8</p>\r\n', 137, 'Radial Lug Terminal', '51,53', '', '1.0Ω', '82KΩ', '±1%, ±2%, ±5%, ±10%', 'Std. ±100ppm/°C; On Request ±30ppm/°C ', 9.5, 22, 'PYP8', 'PYP8', 'PYP8', '5', '1', '0', '2024-07-08 14:10:02', '0000-00-00 00:00:00'),
(134, '16,18', 16, 'G3', '134-g3', '<p>G3</p>\r\n', 118, 'Axial Leaded', '17', '', '75Ω', '5KΩ', '\">1Ω - ±10%, ≤1Ω - ±10%, ±0.05Ω,  ±5% Available in all values on request\"', '±30ppm/°C', 6, 23, 'G3', 'G3', 'G3', '16', '1', '0', '2024-06-13 18:05:56', '0000-00-00 00:00:00'),
(135, '9,10', 5, 'PYP10', '135-pyp10', '<p>PYP10</p>\r\n', 138, 'Radial Lug Terminal', '57,63', '', '1.0Ω', '120KΩ', '±1%, ±2%, ±5%, ±10%', 'Std. ±100ppm/°C; On Request ±30ppm/°C ', 9.5, 31.8, 'PYP10', 'PYP10', 'PYP10', '5', '1', '0', '2024-07-08 14:10:11', '0000-00-00 00:00:00'),
(136, '16,18', 16, 'G5', '136-g5', '<p>G5</p>\r\n', 119, 'Axial Leaded', '31', '', '0.62Ω', '1.5Ω', '\">1Ω - ±10%, ≤1Ω - ±10%, ±0.05Ω,  ±5% Available in all values on request\"', '400 ±50ppm/°C', 6, 30, 'G5', 'G5', 'G5', '16', '1', '0', '2024-06-13 18:11:21', '0000-00-00 00:00:00'),
(137, '16,18', 16, 'G5', '137-g5', '<p>G5</p>\r\n', 120, 'Axial Leaded', '31', '', '1.8Ω', '100Ω', '\">1Ω - ±10%, ≤1Ω - ±10%, ±0.05Ω,  ±5% Available in all values on request\"', '0+40 -80ppm/°C', 6, 30, 'G5', 'G5', 'G5', '16', '1', '0', '2024-06-13 18:16:33', '0000-00-00 00:00:00'),
(138, '27,28,29', 18, 'E020', '138-e020', '<p>E020</p>\r\n', 140, 'Axial Leaded', '2', '', '10Ω ', '800KΩ', '±0.01%, ±0.02%, ±0.05%, ±0.10%', '', 6.35, 8.73, 'E020', 'E020', 'E020', '18', '1', '0', '2024-06-14 15:43:42', '0000-00-00 00:00:00'),
(139, '27,28,29', 18, 'E010', '139-e010', '<p>E010</p>\r\n', 139, 'Axial Leaded', '1', '', '10Ω ', '250KΩ', '±0.01%, ±0.02%, ±0.05%, ±0.10%', '>100Ω - ±10ppm/°C, >10Ω - ± 20ppm/°C', 3.96, 7.92, 'E010', 'E010', 'E010', '18', '1', '0', '2024-06-14 15:42:25', '0000-00-00 00:00:00'),
(140, '27,28,29', 18, 'E025', '140-e025', '<p>E025</p>\r\n', 140, 'Axial Leaded', '3', '', '10Ω ', '1.2MΩ', '±0.01%, ±0.02%, ±0.05%, ±0.10%', '>100Ω - ±10ppm/°C, >10Ω - ± 20ppm/°C', 6.35, 12.7, 'E025', 'E025', 'E025', '18', '1', '0', '2024-06-13 19:04:13', '0000-00-00 00:00:00'),
(141, '27,28,29', 18, 'E030', '141-e030', '<p>E030</p>\r\n', 141, 'Axial Leaded', '5', '', '10Ω ', '2.5MΩ', '±0.01%, ±0.02%, ±0.05%, ±0.10%', '>100Ω - ±10ppm/°C, >10Ω - ± 20ppm/°C', 6.35, 19.05, 'E030', 'E030', 'E030', '18', '1', '0', '2024-06-13 19:07:14', '0000-00-00 00:00:00'),
(142, '27,28,29', 18, 'E060', '142-e060', '<p>E060</p>\r\n', 142, 'Axial Leaded', '6', '', '10Ω', '6.0MΩ', '±0.01%, ±0.02%, ±0.05%, ±0.10%', '>100Ω - ±10ppm/°C, >10Ω - ± 20ppm/°C', 9.525, 19.05, 'E060', 'E060', 'E060', '18', '1', '0', '2024-06-14 00:04:05', '0000-00-00 00:00:00'),
(143, '27,28,29', 18, 'E080', '143-e080', '<p>E080</p>\r\n', 143, 'Axial Leaded', '8', '', '10Ω', '10.0MΩ', '±0.01%, ±0.02%, ±0.05%, ±0.10%', '>100Ω - ±10ppm/°C, >10Ω - ± 20ppm/°C', 9.525, 25.4, 'E080', 'E080', 'E080', '18', '1', '0', '2024-06-14 00:08:12', '0000-00-00 00:00:00'),
(144, '27,28,29', 19, 'PR1', '144-pr1', '<p>PR1</p>\r\n', 144, 'Axial Leaded', '3', '', '0.1Ω', '10KΩ', '±0.50% for  0.1Ω  to 0.9Ω, ±0.10% for  1.0 Ω  to 99.9Ω,  ±0.05% for  100Ω  to 100KΩ', '±90ppm/°C, ±30ppm/°C, ±10ppm/°C', 4.5, 12, 'PR1', 'PR1', 'PR1', '19', '1', '0', '2024-06-14 00:20:01', '0000-00-00 00:00:00'),
(145, '27,28,29', 19, 'PR2', '145-pr2', '<p>PR2</p>\r\n', 145, 'Axial Leaded', '6', '', '0.1Ω', '20KΩ', '±0.50% for  0.1Ω  to 0.9Ω, ±0.10% for  1.0 Ω  to 99.9Ω,  ±0.05% for  100Ω  to 100KΩ', '±90ppm/°C, ±30ppm/°C, ±10ppm/°C', 6, 18, 'PR2', 'PR2', 'PR2', '19', '1', '0', '2024-06-14 00:23:09', '0000-00-00 00:00:00'),
(146, '27,28,29', 19, 'PR3', '146-pr3', '<p>PR3</p>\r\n', 147, 'Axial Leaded', '9', '', '0.1Ω', '68KΩ', '±0.50% for  0.1Ω  to 0.9Ω, ±0.10% for  1.0 Ω  to 99.9Ω,  ±0.05% for  100Ω  to 100KΩ', '±90ppm/°C, ±30ppm/°C, ±10ppm/°C', 7, 35, 'PR3', 'PR3', 'PR3', '19', '1', '0', '2024-06-14 00:25:49', '0000-00-00 00:00:00'),
(147, '27,28,29', 19, 'PR4', '147-pr4', '<p>PR4</p>\r\n', 147, 'Axial Leaded', '12', '', '0.1Ω', '100KΩ', '±0.50% for  0.1Ω  to 0.9Ω, ±0.10% for  1.0 Ω  to 99.9Ω,  ±0.05% for  100Ω  to 100KΩ', '±90ppm/°C, ±30ppm/°C, ±10ppm/°C', 7, 50, 'PR4', 'PR4', 'PR4', '19', '1', '0', '2024-06-14 00:28:22', '0000-00-00 00:00:00'),
(148, '4,5,30,31,32,33,34,35,36', 20, 'PTE11', '148-pte11', '<p>PTE11</p>\r\n', 149, 'Axial Leaded', '4', '', '200Ω ', '700MΩ', ' ±1%, ±2%, ±5%, ±10%', 'Std. 100ppm/°C ; Others On Req.', 3.5, 11, 'PTE11', 'PTE11', 'PTE11', '20', '1', '0', '2024-06-14 15:28:18', '0000-00-00 00:00:00'),
(149, '4,5,30,31,32,33,34,35,36', 20, 'PTE15', '149-pte15', '<p>PTE15</p>\r\n', 150, 'Axial Leaded', '7', '', '200Ω ', '700MΩ', ' ±1%, ±2%, ±5%, ±10%', 'Std. 100ppm/°C ; Others On Req.', 5, 15, 'PTE15', 'PTE15', 'PTE15', '20', '1', '0', '2024-06-14 15:33:30', '0000-00-00 00:00:00'),
(150, '2,8,11,12,38,39,40', 28, 'PHEF320', '150-phef320', '<p>PHEF320</p>\r\n', 200, 'Insulated Cables', '118', '', '10Ω', '10Ω', '±5%, ±10%', '-80 to 200ppm/°C', 91, 320, 'PHEF320', 'PHEF320', 'PHEF320', '28', '1', '0', '2024-07-08 18:19:15', '0000-00-00 00:00:00'),
(151, '4,5,30,31,32,33,34,35,36', 20, 'PTE19', '151-pte19', '<p>PTE19</p>\r\n', 151, 'Axial Leaded', '10', '', '200Ω ', '700MΩ', '±0.5%, ±1%, ±2%, ±5%, ±10%', 'Std. 100ppm/°C ; Others On Req.', 5, 19, 'PTE19', 'PTE19', 'PTE19', '20', '1', '0', '2024-06-14 15:52:17', '0000-00-00 00:00:00');
INSERT INTO `tbl_product` (`p_id`, `application_id`, `series_id`, `product_name`, `slug`, `description`, `position`, `termination_type`, `power_rating`, `cross_reference`, `min_resistance`, `max_resistance`, `resistor_tolerance`, `tcr_ppm_c`, `dimension_width`, `dimension_height`, `meta_title`, `meta_keyword`, `meta_description`, `related_series`, `status`, `delete_status`, `created_on`, `updated_on`) VALUES
(152, '11,19,23,29,41,42', 29, 'EBWD3812', '152-ebwd3812', '<p>EBWD3812</p>\r\n', 201, 'Surface Mount', '12', '', '2mΩ', '25mΩ', '>0.002Ω = ±1%, ±3%, ±5% <0.002Ω = ±3%, ±5%', '<±10ppm/K (Copper Manganese Alloys), <-25ppm/K (Aluchrom alloys) <±20ppm/K (CM3)', 3.05, 11.18, 'EBWD3812', 'EBWD3812', 'EBWD3812', '29', '1', '0', '2024-06-14 15:52:38', '0000-00-00 00:00:00'),
(153, '11,16,19,42', 22, 'PML3', '153-pml3', '<p>PML3</p>\r\n', 171, 'Axial Leaded', '19', '', '0.005Ω', '0.051Ω', '±1%, ±2%, ±5% ', '-', 5.33, 14.22, 'PML3', 'PML3', 'PML3', '22', '1', '0', '2024-06-14 15:52:47', '0000-00-00 00:00:00'),
(154, '11,19,23,29,41,42', 29, 'EBWD4524', '154-ebwd4524', '<p>EBWD4524</p>\r\n', 202, 'Surface Mount', '31', '', '1mΩ', '25mΩ', '>0.002Ω = ±1%, ±3%, ±5% <0.002Ω = ±3%, ±5%', '<±10ppm/K (Copper Manganese Alloys), <-25ppm/K (Aluchrom alloys) <±20ppm/K (CM3)', 3.5, 11.35, 'EBWD4524', 'EBWD4524', 'EBWD4524', '29', '1', '0', '2024-06-14 15:55:16', '0000-00-00 00:00:00'),
(155, '11,16,19,42', 22, 'PML4', '155-pml4', '<p>PML4</p>\r\n', 172, 'Axial Leaded', '27', '', '0.005Ω', '0.051Ω', '±1%, ±2%, ±5% ', '-', 6.35, 19.05, 'PML4', 'PML4', 'PML4', '22', '1', '0', '2024-06-14 15:56:33', '0000-00-00 00:00:00'),
(156, '11,19,23,29,41,42', 29, 'EBWD4512', '156-ebwd4512', '<p>EBWD4512</p>\r\n', 203, 'Surface Mount', '31', '', '2mΩ ', '50mΩ', '>0.002Ω = ±1%, ±3%, ±5% <0.002Ω = ±3%, ±5%', '<±10ppm/K (Copper Manganese Alloys), <-25ppm/K (Aluchrom alloys) <±20ppm/K (CM3)', 3.5, 11.35, 'EBWD4512', 'EBWD4512', 'EBWD4512', '29', '1', '0', '2024-06-14 15:58:06', '0000-00-00 00:00:00'),
(157, '4,5,30,31,32,33,34,35,36', 20, 'PTE24', '157-pte24', '<p>PTE24</p>\r\n', 152, 'Axial Leaded', '14', '', '200Ω ', '700MΩ', '±0.5%, ±1%, ±2%, ±5%, ±10%', 'Std. 100ppm/°C ; Others On Req.', 8, 24, 'PTE24', 'PTE24', 'PTE24', '20', '1', '0', '2024-06-14 15:59:36', '0000-00-00 00:00:00'),
(158, '11,16,19,42', 22, 'PML5', '158-pml5', '<p>PML5</p>\r\n', 173, 'Axial Leaded', '34', '', '0.005Ω', '0.051Ω', '±1%, ±2%, ±5% ', '-', 8.38, 23.5, 'PML5', 'PML5', 'PML5', '22', '1', '0', '2024-06-14 16:00:09', '0000-00-00 00:00:00'),
(159, '1,3,27,29,42', 1, 'P2D', '159-p2d', '<p>P2D</p>\r\n', 40, 'Axial leaded', '19', '', '0.1Ω', '1KΩ', '±0.05%, ±0.1%, ±0.5%, ±1%', 'Std: ±30ppm/°C,  ±10ppm/°C  Offered in certain values on request', 4.7, 12, 'P2D', 'P2D', 'P2D', '1', '1', '0', '2024-07-08 14:32:43', '0000-00-00 00:00:00'),
(160, '11,19,23,29,41,42', 30, 'EBW2512', '160-ebw2512', '<p>EBW2512</p>\r\n', 205, 'Surface Mount', '12,17,18', '', '0.3mΩ', '5mΩ', '±1%, ±2%, ±5%', 'From 50ppm/K', 3.25, 6.5, 'EBW2512', 'EBW2512', 'EBW2512', '30', '1', '0', '2024-06-14 16:03:11', '0000-00-00 00:00:00'),
(161, '4,5,30,31,32,33,34,35,36', 20, 'PTE39', '161-pte39', '<p>PTE39</p>\r\n', 153, 'Axial Leaded', '21', '', '200Ω ', '700MΩ', '±0.5%, ±1%, ±2%, ±5%, ±10%', 'Std. 100ppm/°C ; Others On Req.', 8, 39, 'PTE39', 'PTE39', 'PTE39', '20', '1', '0', '2024-06-14 16:04:01', '0000-00-00 00:00:00'),
(162, '8,16', 23, 'J3', '162-j3', '<p>J3</p>\r\n', 174, 'Axial Leaded', '19', '', '1Ω', '1KΩ', '-', 'Within ±200ppm/°C', 5.5, 15, 'J3', 'J3', 'J3', '23', '1', '0', '2024-06-14 16:07:35', '0000-00-00 00:00:00'),
(163, '4,5,30,31,32,33,34,35,36', 20, 'PTE52', '163-pte52', '<p>PTE52</p>\r\n', 154, 'Axial Leaded', '36', '', '200Ω ', '700MΩ', '±0.5%, ±1%, ±2%, ±5%, ±10%', 'Std. 100ppm/°C ; Others On Req.', 8, 52, 'PTE52', 'PTE52', 'PTE52', '20', '1', '0', '2024-06-14 16:08:46', '0000-00-00 00:00:00'),
(164, '8,16', 23, 'J7', '164-j7', '<p>J7</p>\r\n', 175, 'Axial Leaded', '41', '', '1Ω', '1KΩ', '-', 'Within ±200ppm/°C', 8, 26, 'J7', 'J7', 'J7', '23', '1', '0', '2024-06-14 16:12:42', '0000-00-00 00:00:00'),
(165, '4,5,30,31,32,33,34,35,36', 20, 'PTE76', '165-pte76', '<p>PTE76</p>\r\n', 155, 'Axial Leaded', '45', '', '200Ω ', '700MΩ', '±0.5%, ±1%, ±2%, ±5%, ±10%', 'Std. 100ppm/°C ; Others On Req.', 9, 76, 'PTE76', 'PTE76', 'PTE76', '20', '1', '0', '2024-06-14 16:13:43', '0000-00-00 00:00:00'),
(166, '11,19,23,29,41,42', 30, 'EBW3920', '166-ebw3920', '<p>EBW3920</p>\r\n', 206, 'Surface Mount', '12,17,26,31,32', '', '0.2mΩ', '5mΩ', '±1%, ±2%, ±5%', 'From 50ppm/K', 5.2, 10.2, 'EBW3920', 'EBW3920', 'EBW3920', '30', '1', '0', '2024-06-14 16:22:21', '0000-00-00 00:00:00'),
(167, '4,5,30,31,32,33,34,35,36', 20, 'PTE102', '167-pte102', '<p>PTE102</p>\r\n', 156, 'Axial Leaded', '60', '', '200Ω ', '700MΩ', '±0.5%, ±1%, ±2%, ±5%, ±10%', 'Std. 100ppm/°C ; Others On Req.', 9, 102, 'PTE102', 'PTE102', 'PTE102', '20', '1', '0', '2024-06-14 16:23:14', '0000-00-00 00:00:00'),
(168, '8,16', 23, 'J10', '168-j10', '<p>J10</p>\r\n', 176, 'Axial Leaded', '51', '', '1Ω', '1KΩ', '-', 'Within ±200ppm/°C', 8, 39, 'J10', 'J10', 'J10', '23', '1', '0', '2024-06-14 16:23:35', '0000-00-00 00:00:00'),
(169, '8,16', 23, 'J14', '169-j14', '<p>J14</p>\r\n', 177, 'Axial Leaded', '67', '', '1Ω', '1KΩ', '-', 'Within ±200ppm/°C', 8, 54, 'J14', 'J14', 'J14', '23', '1', '0', '2024-06-14 16:25:46', '0000-00-00 00:00:00'),
(170, '11,19,23,29,41,42', 30, 'EBW5930', '170-ebw5930', '<p>EBW5930</p>\r\n', 207, 'Surface Mount', '26,37,40,48', '', '0.2mΩ', '2mΩ', '±1%, ±2%, ±5%', 'From 50ppm/K', 7.75, 15, 'EBW5930', 'EBW5930', 'EBW5930', '30', '1', '0', '2024-06-14 16:25:56', '0000-00-00 00:00:00'),
(171, '1,43', 31, 'PSA11', '171-psa11', '<p>PSA11</p>\r\n', 208, 'Leadless', '15', '', '100Ω', '6KΩ', '±5%, ±10%, ±20%, +20%, -10%', 'Within ±200ppm/°C', 5.5, 12.5, 'PSA11', 'PSA11', 'PSA11', '31', '1', '0', '2024-06-14 16:28:03', '0000-00-00 00:00:00'),
(172, '1,43', 31, 'PSA15', '172-psa15', '<p>PSA15</p>\r\n', 209, 'Leadless', '21', '', '100Ω', '8KΩ', '±5%, ±10%, ±20%, +20%, -10%', 'Within ±200ppm/°C', 5.5, 15.5, 'PSA15', 'PSA15', 'PSA15', '31', '1', '0', '2024-06-14 16:35:45', '0000-00-00 00:00:00'),
(173, '1,43', 31, 'PSA18', '173-psa18', '<p>PSA18</p>\r\n', 210, 'Leadless', '25', '', '100Ω', '12KΩ', '±5%, ±10%, ±20%, +20%, -10%', 'Within ±200ppm/°C', 5.5, 18, 'PSA18', 'PSA18', 'PSA18', '31', '1', '0', '2024-06-14 16:38:11', '0000-00-00 00:00:00'),
(174, '1,2,8,11,13,16,18,19,20,21,37,38', 7, 'PHA10', '174-pha10', '<p>PHA10</p>\r\n', 158, 'Axial Leaded', '73', '', '200Ω ', '700MΩ', '±0.5%, ±1%, ±2%, ±5%, ±10%', 'Std. 100ppm/°C ; Others On Req.', 9, 152, 'PHA10', 'PHA10', 'PHA10', '7', '1', '0', '2024-07-08 18:27:47', '0000-00-00 00:00:00'),
(175, '1,11,12,16,38', 24, 'PHF130', '175-phf130', '<p>PHF130</p>\r\n', 178, 'Insulated Cables', '87', '', '10Ω', '1KΩ', '±5%, ±10%', '≤260ppm/°C', 41.3, 130, 'PHF130', 'PHF130', 'PHF130', '24', '1', '0', '2024-07-08 14:39:35', '0000-00-00 00:00:00'),
(176, '1,43', 31, 'P3B', '176-p3b', '<p>P3B</p>\r\n', 211, 'Leadless', '28', '', '100Ω', '15KΩ', '±5%, ±10%, ±20%, +20%, -10%', 'Within ±200ppm/°C', 5.5, 21.5, 'P3B', 'P3B', 'P3B', '31', '1', '0', '2024-06-14 16:40:25', '0000-00-00 00:00:00'),
(177, '2,37,39,40', 32, 'PSGR500', '177-psgr500', '<p>PSGR500</p>\r\n', 212, 'Bolt & Nuts', '120', '', '0.047Ω', '0.047Ω', ' ±10%', '-', 180, 400, 'PSGR500', 'PSGR500', 'PSGR500', '32', '1', '0', '2024-06-14 16:44:52', '0000-00-00 00:00:00'),
(178, '2,20,39,40,44,45', 33, 'FRH250', '178-frh250', '<p>FRH250</p>\r\n', 213, 'Connector Housing ', '108', '', '', '', '-', '-', 80, 187, 'FRH250', 'FRH250', 'FRH250', '33', '1', '0', '2024-07-08 18:14:44', '0000-00-00 00:00:00'),
(179, '4,5,30,31,32,33,34,35,36', 20, 'PTE152', '179-pte152', '<p>PTE152</p>\r\n', 157, 'Axial Leaded', '73', '', '200Ω ', '700MΩ', '±0.5%, ±1%, ±2%, ±5%, ±10%', 'Std. 100ppm/°C ; Others On Req.', 9, 152, 'PTE152', 'PTE152', 'PTE152', '20', '1', '0', '2024-06-14 16:48:16', '0000-00-00 00:00:00'),
(180, '2,20,39,40,44,45', 33, 'FRH400', '180-frh400', '<p>FRH400</p>\r\n', 214, 'Connector Housing', '116', '', '', '', '-', '-', 80, 260, 'FRH400', 'FRH400', 'FRH400', '33', '1', '0', '2024-07-08 18:14:38', '0000-00-00 00:00:00'),
(181, '2,8,9,10,11,12,13,14,15,16', 34, 'PPRC300', '181-pprc300', '<p>PPRC300</p>\r\n', 215, 'Radial Tubular Lug Terminals', '111', '', '1Ω', '25Ω', 'Std. ±10%, ±5%, On request ±1%, ±2%', '<300ppm/°C Max', 35, 265, 'PPRC300', 'PPRC300', 'PPRC300', '34', '1', '0', '2024-06-14 16:52:13', '0000-00-00 00:00:00'),
(182, '2,8,9,10,11,12,13,14,15,16', 34, 'PPRC500', '182-pprc500', '<p>PPRC500</p>\r\n', 216, 'Radial Tubular Lug Terminals', '121', '', '1Ω', '50Ω', 'Std. ±10%, ±5%, On request ±1%, ±2%', '<200ppm/°C Max', 60, 326, 'PPRC500', 'PPRC500', 'PPRC500', '34', '1', '0', '2024-06-14 16:55:18', '0000-00-00 00:00:00'),
(183, '1,11,12,16,38', 24, 'PHF165', '183-phf165', '<p>PHF165</p>\r\n', 179, 'Insulated Cables', '95', '', '1Ω', '2KΩ', '±5%, ±10%', '-80 to 200ppm/°C', 41.3, 165, 'PHF165', 'PHF165', 'PHF165', '24', '1', '0', '2024-07-08 14:39:28', '0000-00-00 00:00:00'),
(184, '1,2,8,11,13,16,18,19,20,21,37,38', 7, 'PHA15', '184-pha15', '<p>PHA15</p>\r\n', 159, 'Chassis Mount', '71', '', '0.01Ω', '20KΩ', '±0.05%, ±0.1%, ±0.25%, ±0.5%, ±1%, ±2%, ±3%, ±5%, ±10%', 'For ≥5Ω to ≤10Ω : < ±100ppm/°C ; For >10Ω : ±50ppm/°C', 11, 21, 'PHA15', 'PHA15', 'PHA15', '7', '1', '0', '2024-07-08 18:27:41', '0000-00-00 00:00:00'),
(185, '4,5,30,31,32,33,34,35,36', 35, 'PUT20', '185-put20', '<p>PUT20</p>\r\n', 216, 'Ferrule End Caps', '74', '', '1KΩ ', '1GΩ ', '±1%, ±2%, ±5%, ±10%', 'Std. 100ppm/°C,  referenced to 25°C, from -15°C to +105°C, other TCR on request.', 15, 158, 'PUT20', 'PUT20', 'PUT20', '35', '1', '0', '2024-06-14 16:58:52', '0000-00-00 00:00:00'),
(186, '2,6,8,11,12,20,37,38,39,40,44', 25, 'PHBH/PHBV 100', '186-phbh-phbv-100', '<p>PHBH/PHBV 100</p>\r\n', 180, 'Insulated Cables', '88', '', '0.5Ω', '300Ω', '±5%, ±10%', 'Within ±200ppm/°C', 40, 100, 'PHBH/PHBV 100', 'PHBH/PHBV 100', 'PHBH/PHBV 100', '25', '1', '0', '2024-07-08 18:37:02', '0000-00-00 00:00:00'),
(187, '1,2,8,11,13,16,18,19,20,21,37,38', 7, 'PHA25', '187-pha25', '<p>PHA25</p>\r\n', 160, 'Chassis Mount ', '78', '', '0.051Ω', '20KΩ', '±0.05%, ±0.1%, ±0.25%, ±0.5%, ±1%, ±2%, ±3%, ±5%, ±10%', 'For <10Ω : <±100ppm/°C; For >10Ω : <±50ppm/°C', 15, 29, 'PHA25', 'PHA25', 'PHA25', '7', '1', '0', '2024-07-08 18:27:36', '0000-00-00 00:00:00'),
(188, '2,6,8,11,12,20,37,38,39,40,44', 25, 'PHBH/PHBV 150', '188-phbh-phbv-150', '<p>PHBH/PHBV 150</p>\r\n', 181, 'Insulated Cables', '92', '', '0.5Ω', '500Ω', '±5%, ±10%', 'Within ±200ppm/°C', 40, 150, 'PHBH/PHBV 150', 'PHBH/PHBV 150', 'PHBH/PHBV 150', '25', '1', '0', '2024-07-08 18:36:57', '0000-00-00 00:00:00'),
(189, '1,2,8,11,13,16,18,19,20,21,37,38', 7, 'PHA50', '189-pha50', '<p>PHA50</p>\r\n', 161, 'Chassis Mount ', '85', '', '0.010Ω', '100KΩ', '±0.05%, ±0.1%, ±0.25%, ±0.5%, ±1%, ±2%, ±3%, ±5%, ±10%', 'For <10Ω : <±100ppm/°C; For >10Ω : <±50ppm/°C', 17, 51, 'PHA50', 'PHA50', 'PHA50', '7', '1', '0', '2024-07-08 18:27:29', '0000-00-00 00:00:00'),
(190, '2,6,8,11,12,20,37,38,39,40,44', 25, 'PHBH/PHBV 165', '190-phbh-phbv-165', '<p>PHBH/PHBV 165</p>\r\n', 182, 'Insulated Cables', '97', '', '1.0Ω', '750Ω', '±5%, ±10%', 'Within ±200ppm/°C', 40, 165, 'PHBH/PHBV 165', 'PHBH/PHBV 165', 'PHBH/PHBV 165', '25', '1', '0', '2024-07-08 18:36:52', '0000-00-00 00:00:00'),
(191, '2,6,8,11,12,20,37,38,39,40,44', 25, 'PHBH/PHBV 210', '191-phbh-phbv-210', '<p>PHBH/PHBV 210</p>\r\n', 183, 'Insulated Cables', '98', '', '1.0Ω', '1000Ω', '±5%, ±10%', 'Within ±200ppm/°C', 40, 210, 'PHBH/PHBV 210', 'PHBH/PHBV 210', 'PHBH/PHBV 210', '25', '1', '0', '2024-07-08 18:36:47', '0000-00-00 00:00:00'),
(192, '3,15,16,18,19,26', 8, 'PQM2', '192-pqm2', '<p>PQM2</p>\r\n', 162, 'Leaded - Vertical Mount', '14', '', '0.05Ω', '2.7KΩ', 'For R<1Ω : 10%, R>1Ω: 5%. On request 1%, 2%', 'Std: ±200ppm/°C, <450ppm/°C for Low Values On request: Down to ±20ppm/°C', 11, 21, 'PQM2', 'PQM2', 'PQM2', '8', '1', '0', '2024-07-08 16:49:04', '0000-00-00 00:00:00'),
(193, '2,6,8,11,12,20,37,38,39,40,44', 25, 'PHBH/PHBV 240', '193-phbh-phbv-240', '<p>PHBH/PHBV 240</p>\r\n', 184, 'Insulated Cables', '100', '', '1.0Ω', '1000Ω', '±5%, ±10%', 'Within ±200ppm/°C', 40, 240, 'PHBH/PHBV 240', 'PHBH/PHBV 240', 'PHBH/PHBV 240', '25', '1', '0', '2024-07-08 18:36:42', '0000-00-00 00:00:00'),
(194, '3,15,16,18,19,26', 8, 'PQM3', '194-pqm3', '<p>PQM3</p>\r\n', 163, 'Leaded - Vertical Mount', '21', '', '0.05Ω', '6.8KΩ', 'For R<1Ω : 10%, R>1Ω: 5%. On request 1%, 2%', 'Std: ±200ppm/°C, <450ppm/°C for Low Values On request: Down to ±20ppm/°C', 12, 25, 'PQM3', 'PQM3', 'PQM3', '8', '1', '0', '2024-07-08 16:48:59', '0000-00-00 00:00:00'),
(195, '2,6,8,11,12,20,37,38,39,40,44', 25, 'PHBH/PHBV 300', '195-phbh-phbv-300', '<p>PHBH/PHBV 300</p>\r\n', 185, 'Insulated Cables', '104', '', '1.0Ω', '1000Ω', '±5%, ±10%', 'Within ±200ppm/°C', 40, 300, 'PHBH/PHBV 300', 'PHBH/PHBV 300', 'PHBH/PHBV 300', '25', '1', '0', '2024-07-08 18:36:38', '0000-00-00 00:00:00'),
(196, '3,15,16,18,19,26', 8, 'PQM5', '196-pqm5', '<p>PQM5</p>\r\n', 164, 'Leaded - Vertical Mount', '36', '', '0.05Ω', '6.8KΩ', 'For R<1Ω : 10%, R>1Ω: 5%. On request 1%, 2%', 'Std: ±200ppm/°C, <450ppm/°C for Low Values On request: Down to ±20ppm/°C', 13, 25, 'PQM5', 'PQM5', 'PQM5', '8', '1', '0', '2024-07-08 16:48:55', '0000-00-00 00:00:00'),
(197, '3,15,16,18,19,26', 8, 'PQM7', '197-pqm7', '<p>PQM7</p>\r\n', 165, 'Leaded - Vertical Mount', '42', '', '0.10Ω', '8.2KΩ', 'For R<1Ω : 10%, R>1Ω: 5%. On request 1%, 2%', 'Std: ±200ppm/°C, <450ppm/°C for Low Values On request: Down to ±20ppm/°C', 13, 39, 'PQM7', 'PQM7', 'PQM7', '8', '1', '0', '2024-07-08 16:48:50', '0000-00-00 00:00:00'),
(198, '4,5,30,31,32,33,34,35,36', 35, 'PUT35', '198-put35', '<p>PUT35</p>\r\n', 218, 'Ferrule End Caps', '81', '', '1KΩ ', '1GΩ ', '±1%, ±2%, ±5%, ±10%', 'Std. 100ppm/°C,  referenced to 25°C, from -15°C to +105°C, other TCR on request.', 33, 110, 'PUT35', 'PUT35', 'PUT35', '35', '1', '0', '2024-06-14 17:24:40', '0000-00-00 00:00:00'),
(199, '2,6,8,11,12,20,37,38,39,40,44', 25, 'PHBH/PHBV 360', '199-phbh-phbv-360', '<p>PHBH/PHBV 360</p>\r\n', 186, 'Insulated Cables', '106', '', '2.0Ω', '1000Ω', '±5%, ±10%', 'Within ±200ppm/°C', 40, 360, 'PHBH/PHBV 360', 'PHBH/PHBV 360', 'PHBH/PHBV 360', '25', '1', '0', '2024-07-08 18:36:33', '0000-00-00 00:00:00'),
(200, '3,15,16,18,19,26', 8, 'PQM10WS', '200-pqm10ws', '<p>PQM10WS</p>\r\n', 166, 'Leaded - Vertical Mount', '52', '', '0.10Ω', '20KΩ', 'For R<1Ω : 10%, R>1Ω: 5%. On request 1%, 2%', 'Std: ±200ppm/°C, <450ppm/°C for Low Values On request: Down to ±20ppm/°C', 16, 35, 'PQM10WS', 'PQM10WS', 'PQM10WS', '8', '1', '0', '2024-07-08 16:48:45', '0000-00-00 00:00:00'),
(201, '4,5,30,31,32,33,34,35,36', 35, 'PUT50', '201-put50', '<p>PUT50</p>\r\n', 219, 'Ferrule End Caps', '84', '', '1KΩ ', '1GΩ ', '±1%, ±2%, ±5%, ±10%', 'Std. 100ppm/°C,  referenced to 25°C, from -15°C to +105°C, other TCR on request.', 33, 160, 'PUT50', 'PUT50', 'PUT50', '35', '1', '0', '2024-06-14 17:27:33', '0000-00-00 00:00:00'),
(202, '4,5,30,31,32,33,34,35,36', 35, 'PUT70', '202-put70', '<p>PUT70</p>\r\n', 220, 'Ferrule End Caps', '89', '', '1KΩ ', '1GΩ ', '±1%, ±2%, ±5%, ±10%', 'Std. 100ppm/°C,  referenced to 25°C, from -15°C to +105°C, other TCR on request.', 33, 210, 'PUT70', 'PUT70', 'PUT70', '35', '1', '0', '2024-06-14 17:30:01', '0000-00-00 00:00:00'),
(203, '2,6,8,9,10,11,12,13,14,15,16,17', 21, 'PVRC90', '203-pvrc90', '<p>PVRC90</p>\r\n', 167, 'Radial Tubular Lug Terminals', '93', '', '0.5Ω', '10Ω', ' ±2%, ±5%, Standard: ±10%', '400ppm/°C Max', 14.29, 101.6, 'PVRC90', 'PVRC90', 'PVRC90', '21', '1', '0', '2024-07-08 17:02:28', '0000-00-00 00:00:00'),
(204, '2,6,8,9,10,11,12,13,14,15,16,17', 21, 'PVRC180', '204-pvrc180', '<p>PVRC180</p>\r\n', 168, 'Radial Tubular Lug Terminals', '103', '', '0.5Ω', '20Ω', ' ±2%, ±5%, Standard: ±10%', '400ppm/°C Max', 19.05, 165.1, 'PVRC180', 'PVRC180', 'PVRC180', '21', '1', '0', '2024-07-08 17:02:23', '0000-00-00 00:00:00'),
(205, '2,6,8,11,12,20,38,39,40,44', 26, 'PHCF80', '205-phcf80', '<p>PHCF80</p>\r\n', 187, 'Insulated Cables', '91', '', '1Ω', '4000Ω', '±5%, ±10%', 'Within ±200ppm/°C', 76, 80, 'PHCF80', 'PHCF80', 'PHCF80', '26', '1', '0', '2024-07-08 18:35:45', '0000-00-00 00:00:00'),
(206, '2,6,8,9,10,11,12,13,14,15,16,17', 21, 'PVRC300', '206-pvrc300', '<p>PVRC300</p>\r\n', 169, 'Radial Tubular Lug Terminals', '111', '', '1Ω', '30Ω', ' ±2%, ±5%, Standard: ±10%', '400ppm/°C Max', 28.58, 215.9, 'PVRC300', 'PVRC300', 'PVRC300', '21', '1', '0', '2024-07-08 17:02:18', '0000-00-00 00:00:00'),
(207, '2,6,8,11,12,20,38,39,40,44', 26, 'PHCF110', '207-phcf110', '<p>PHCF110</p>\r\n', 188, 'Insulated Cables', '97', '', '1.5Ω', '5000Ω', '±5%, ±10%', 'Within ±200ppm/°C', 76, 110, 'PHCF110', 'PHCF110', 'PHCF110', '26', '1', '0', '2024-07-08 18:35:40', '0000-00-00 00:00:00'),
(208, '2,6,8,9,10,11,12,13,14,15,16,17', 21, 'PVRC375', '208-pvrc375', '<p>PVRC375</p>\r\n', 170, 'Radial Tubular Lug Terminals', '114', '', '1Ω', '50Ω', ' ±2%, ±5%, Standard: ±10%', '400ppm/°C Max', 28.58, 266.7, 'PVRC375', 'PVRC375', 'PVRC375', '21', '1', '0', '2024-07-08 17:02:12', '0000-00-00 00:00:00'),
(209, '2,6,8,11,12,20,38,39,40,44', 26, 'PHCF166', '209-phcf166', '<p>PHCF166</p>\r\n', 189, 'Insulated Cables', '101', '', '3Ω', '8200Ω', '±5%, ±10%', 'Within ±200ppm/°C', 76, 166, 'PHCF166', 'PHCF166', 'PHCF166', '26', '1', '0', '2024-07-08 18:35:35', '0000-00-00 00:00:00'),
(210, '2,6,8,11,12,37,38,39,40', 27, 'PHCH/PHCV 165', '210-phch-phcv-165', '<p>PHCH/PHCV 165</p>\r\n', 195, 'Insulated Cables', '106', '', '2.2Ω', '6.8KΩ', '±5%, ±10%', 'Within ±200ppm/°C', 60, 165, 'PHCH/PHCV 165', 'PHCH/PHCV 165', 'PHCH/PHCV 165', '27', '1', '0', '2024-07-08 18:18:45', '0000-00-00 00:00:00'),
(211, '2,6,8,11,12,20,38,39,40,44', 26, 'PHCF216', '211-phcf216', '<p>PHCF216</p>\r\n', 190, 'Insulated Cables', '106', '', '4Ω', '8200Ω', '±5%, ±10%', 'Within ±200ppm/°C', 76, 216, 'PHCF216', 'PHCF216', 'PHCF216', '26', '1', '0', '2024-07-08 18:35:30', '0000-00-00 00:00:00'),
(212, '2,6,8,11,12,20,38,39,40,44', 26, 'PHCF270', '212-phcf270', '<p>PHCF270</p>\r\n', 191, 'Insulated Cables', '109', '', '6Ω', '10000Ω', '±5%, ±10%', 'Within ±200ppm/°C', 76, 270, 'PHCF270', 'PHCF270', 'PHCF270', '26', '1', '0', '2024-07-08 18:35:25', '0000-00-00 00:00:00'),
(213, '2,6,8,11,12,37,38,39,40', 27, 'PHCH/PHCV 165', '213-phch-phcv-165', '<p>PHCH/PHCV 165</p>\r\n', 195, 'Insulated Cables', '106', '', '2.2Ω', '6.8KΩ', '±5%, ±10%', 'Within ±200ppm/°C', 60, 165, 'PHCH/PHCV 165', 'PHCH/PHCV 165', 'PHCH/PHCV 165', '27', '1', '0', '2024-07-08 18:18:41', '0000-00-00 00:00:00'),
(214, '2,6,8,11,12,20,38,39,40,44', 26, 'PHCF320', '214-phcf320', '<p>PHCF320</p>\r\n', 192, 'Insulated Cables', '119', '', '20Ω', '10000Ω', '±5%, ±10%', 'Within ±200ppm/°C', 76, 320, 'PHCF320', 'PHCF320', 'PHCF320', '26', '1', '0', '2024-07-08 18:35:20', '0000-00-00 00:00:00'),
(215, '2,6,8,11,12,37,38,39,40', 27, 'PHCH/PHCV 215', '215-phch-phcv-215', '<p>PHCH/PHCV 215</p>\r\n', 196, 'Insulated Cables', '112', '', '3.3Ω', '8.2KΩ', '±5%, ±10%', 'Within ±200ppm/°C', 60, 215, 'PHCH/PHCV 215', 'PHCH/PHCV 215', 'PHCH/PHCV 215', '27', '1', '0', '2024-07-08 18:18:38', '0000-00-00 00:00:00'),
(216, '2,6,8,11,12,20,38,39,40,44', 26, 'PHCF420', '216-phcf420', '<p>PHCF420</p>\r\n', 192, 'Insulated Cables', '115', '', '16Ω', '10000Ω', '±5%, ±10%', 'Within ±200ppm/°C', 76, 420, 'PHCF420', 'PHCF420', 'PHCF420', '26', '1', '0', '2024-07-08 18:35:16', '0000-00-00 00:00:00'),
(217, '2,6,8,11,12,37,38,39,40', 27, 'PHCH/PHCV 265', '217-phch-phcv-265', '<p>PHCH/PHCV 265</p>\r\n', 197, 'Insulated Cables', '117', '', '4.7Ω', '10KΩ', '±5%, ±10%', 'Within ±200ppm/°C', 60, 265, 'PHCH/PHCV 265', 'PHCH/PHCV 265', 'PHCH/PHCV 265', '27', '1', '0', '2024-07-08 18:18:34', '0000-00-00 00:00:00'),
(218, '2,6,8,11,12,20,38,39,40,44', 26, 'PHCF520', '218-phcf520', '<p>PHCF520</p>\r\n', 194, 'Insulated Cables', '119', '', '20Ω', '10000Ω', '±5%, ±10%', 'Within ±200ppm/°C', 76, 520, 'PHCF520', 'PHCF520', 'PHCF520', '26', '1', '0', '2024-07-08 18:35:10', '0000-00-00 00:00:00'),
(219, '2,6,8,11,12,37,38,39,40', 27, 'PHCH/PHCV 335', '219-phch-phcv-335', '<p>PHCH/PHCV 335</p>\r\n', 198, 'Insulated Cables', '122', '', '5.6Ω', '10KΩ', '±5%, ±10%', 'Within ±200ppm/°C', 60, 335, 'PHCH/PHCV 335', 'PHCH/PHCV 335', 'PHCH/PHCV 335', '27', '1', '0', '2024-07-08 18:18:30', '0000-00-00 00:00:00'),
(220, '2,6,8,11,12,37,38,39,40', 27, 'PHCH/PHCV 405', '220-phch-phcv-405', '<p>PHCH/PHCV 405</p>\r\n', 199, 'Insulated Cables', '124', '', '8.2Ω', '10KΩ', '±5%, ±10%', 'Within ±200ppm/°C', 60, 405, 'PHCH/PHCV 405', 'PHCH/PHCV 405', 'PHCH/PHCV 405', '27', '1', '0', '2024-07-08 18:18:26', '0000-00-00 00:00:00'),
(221, '4,5,30,31,32,33,34,35,36', 35, 'PUT100', '221-put100', '<p>PUT100</p>\r\n', 221, 'Ferrule End Caps', '94', '', '1KΩ ', '1GΩ', '±1%, ±2%, ±5%, ±10%', 'Std. 100ppm/°C,  referenced to 25°C, from -15°C to +105°C, other TCR on request.', 33, 310, 'PUT100', 'PUT100', 'PUT100', '35', '1', '0', '2024-06-14 18:10:50', '0000-00-00 00:00:00'),
(222, '4,5,30,31,32,33,34,35,36', 35, 'PUT150', '222-put150', '<p>PUT150</p>\r\n', 222, 'Ferrule End Caps', '99', '', '1KΩ ', '1GΩ ', '±1%, ±2%, ±5%, ±10%', 'Std. 100ppm/°C,  referenced to 25°C, from -15°C to +105°C, other TCR on request.', 45, 310, 'PUT150', 'PUT150', 'PUT150', '35', '1', '0', '2024-06-14 18:17:43', '0000-00-00 00:00:00'),
(223, '1,8,11,12,38', 36, 'PHPTC35', '223-phptc35', '<p>PHPTC35</p>\r\n', 223, 'Insulated Cables', '50', '', '220W, 260Ω, 350Ω', '-', '±35%', '-', 34, 89, 'PHPTC35', 'PHPTC35', 'PHPTC35', '36', '1', '0', '2024-07-08 14:41:32', '0000-00-00 00:00:00'),
(224, '1,8,11,12,38', 36, 'PHPTC35A', '224-phptc35a', '<p>PHPTC35A</p>\r\n', 224, 'Insulated Cables', '50', '', '220W, 260Ω, 350Ω', '-', '±35%', '-', 34, 73, 'PHPTC35A', 'PHPTC35A', 'PHPTC35A', '36', '1', '0', '2024-07-08 14:41:27', '0000-00-00 00:00:00'),
(225, '1,8,11,12,38', 36, 'PHPTC35B', '225-phptc35b', '<p>PHPTC35B</p>\r\n', 225, 'Insulated Cables', '33', '', '440W, 525Ω, 700Ω', '-', '±35%', '-', 34, 73, 'PHPTC35B', 'PHPTC35B', 'PHPTC35B', '36', '1', '0', '2024-07-08 14:41:21', '0000-00-00 00:00:00'),
(226, '1,8,11,12,38', 36, 'PHPTC70', '226-phptc70', '<p>PHPTC70</p>\r\n', 226, 'Insulated Cables', '75', '', '150W, 175Ω, 240Ω ', '-', '±35%', '-', 34, 115, 'PHPTC70', 'PHPTC70', 'PHPTC70', '36', '1', '0', '2024-07-08 14:41:17', '0000-00-00 00:00:00'),
(227, '1,8,11,12,38', 36, 'PHPTC70A', '227-phptc70a', '<p>PHPTC70A</p>\r\n', 227, 'Insulated Cables', '75', '', '150W, 175Ω, 240Ω', '-', '±35%', '-', 34, 100, 'PHPTC70A', 'PHPTC70A', 'PHPTC70A', '36', '1', '0', '2024-07-08 14:41:11', '0000-00-00 00:00:00'),
(228, '1,8,11,12,38', 36, 'PHPTC105', '228-phptc105', '<p>PHPTC105</p>\r\n', 228, 'Insulated Cables', '80', '', '110W, 130W, 175Ω', '-', '±35%', '-', 34, 139, 'PHPTC105', 'PHPTC105', 'PHPTC105', '36', '1', '0', '2024-07-08 14:40:46', '0000-00-00 00:00:00'),
(229, '1,8,11,12,38', 36, 'PHPTC140', '229-phptc140', '<p>PHPTC140</p>\r\n', 229, 'Insulated Cables', '83', '', '105Ω, 140Ω, 88Ω', '-', '±35%', '-', 34, 167, 'PHPTC140', 'PHPTC140', 'PHPTC140', '36', '1', '0', '2024-07-08 14:40:39', '0000-00-00 00:00:00'),
(230, '1,8,11,12,38', 36, 'PHPTC140A', '230-phptc140a', '<p>PHPTC140A</p>\r\n', 230, 'Insulated Cables', '80', '', '525Ω, 700Ω', '-', '±35%', '-', 34, 167, 'PHPTC140A', 'PHPTC140A', 'PHPTC140A', '36', '1', '0', '2024-07-08 14:40:33', '0000-00-00 00:00:00'),
(231, '1,8,11,12,38', 36, 'PHPTC140B', '231-phptc140b', '<p>PHPTC140B</p>\r\n', 231, 'Insulated Cables', '80', '', '130Ω, 175Ω', '-', '±35%', '-', 34, 167, 'PHPTC140B', 'PHPTC140B', 'PHPTC140B', '36', '1', '0', '2024-07-08 14:40:28', '0000-00-00 00:00:00'),
(232, '1,8,11,12,38', 36, 'PHPTC140C', '232-phptc140c', '<p>PHPTC140C</p>\r\n', 232, 'Insulated Cables', '75', '', '175Ω, 240Ω', '-', '±35%', '-', 34, 167, 'PHPTC140C', 'PHPTC140C', 'PHPTC140C', '36', '1', '0', '2024-07-08 14:40:23', '0000-00-00 00:00:00'),
(233, '8,9,11,14,18,19,20,21', 37, 'V3', '233-v3', '<p>V3</p>\r\n', 233, 'Axial leaded ', '19,20', '', '0.1Ω', '10KΩ', '±1%, ±2%, ±5%, ±10%', 'Std. < +200 ppm/°C, Typ. < +100 ppm/°C', 5.6, 12.7, 'V3', 'V3', 'V3', '37', '1', '0', '2024-06-14 18:55:45', '0000-00-00 00:00:00'),
(234, '8,9,11,14,18,19,20,21', 37, 'V5', '234-v5', '<p>V5</p>\r\n', 234, 'Axial leaded', '34,35', '', '0.1Ω', '20KΩ', '±1%, ±2%, ±5%, ±10%', 'Std. < +200 ppm/°C, Typ. < +100 ppm/°C', 7, 23, 'V5', 'V5', 'V5', '37', '1', '0', '2024-06-14 19:01:30', '0000-00-00 00:00:00'),
(235, '8,9,11,14,18,19,20,21', 37, 'V7', '235-v7', '<p>V7</p>\r\n', 235, 'Axial leaded', '41,43', '', '0.1Ω', '22KΩ', '±1%, ±2%, ±5%, ±10%', 'Std. < +200 ppm/°C, Typ. < +100 ppm/°C', 8, 22.2, 'V7', 'V7', 'V7', '37', '1', '0', '2024-06-14 19:06:27', '0000-00-00 00:00:00'),
(236, '8,9,11,14,18,19,20,21', 37, 'V10', '236-v10', '<p>V10</p>\r\n', 236, 'Axial leaded', '47,51', '', '0.1Ω', '68KΩ', '±1%, ±2%, ±5%, ±10%', 'Std. < +200 ppm/°C, Typ. < +100 ppm/°C', 8, 38, 'V10', 'V10', 'V10', '37', '1', '0', '2024-06-14 19:09:44', '0000-00-00 00:00:00'),
(237, '8,9,11,14,18,19,20,21', 37, 'V14', '237-v14', '<p>V14</p>\r\n', 237, 'Axial leaded ', '60,67', '', '0.1Ω', '100KΩ', '±1%, ±2%, ±5%, ±10%', 'Std. < +200 ppm/°C, Typ. < +100 ppm/°C', 8, 53.5, 'V14', 'V14', 'V14', '37', '1', '0', '2024-06-14 19:19:44', '0000-00-00 00:00:00'),
(238, '11,16,19,42', 38, 'PCL4', '238-pcl4', '<p>PCL4</p>\r\n', 238, 'Axial leaded', '28', '', '0.003Ω', '0.051Ω', '±1%, ±2%, ±5%, ±10%', '-', 6.4, 20, 'PCL4', 'PCL4', 'PCL4', '38', '1', '0', '2024-06-14 19:22:38', '0000-00-00 00:00:00'),
(239, '11,16,19,42', 38, 'PCL5', '239-pcl5', '<p>PCL5</p>\r\n', 239, 'Axial leaded', '36', '', '0.003Ω', '0.051Ω', '±1%, ±2%, ±5%, ±10%', '-', 6.4, 25, 'PCL5', 'PCL5', 'PCL5', '38', '1', '0', '2024-06-14 19:27:10', '0000-00-00 00:00:00'),
(240, '2,8,11,12,39,40', 39, 'PHBR315', '240-phbr315', '<p>PHBR315</p>\r\n', 240, 'Insulated Cables', '113', '', '0.6Ω', '1000Ω', ' ±5%, ±10%', 'Std. < +200 ppm/°C', 60, 175, 'PHBR315', 'PHBR315', 'PHBR315', '39', '1', '0', '2024-07-08 18:33:46', '0000-00-00 00:00:00'),
(241, '2,8,11,12,37,39,40', 39, 'PHBR400', '241-phbr400', '<p>PHBR400</p>\r\n', 241, 'Insulated Cables', '117', '', '0.8Ω', '1000Ω', ' ±5%, ±10%', 'Std. < +200 ppm/°C', 60, 225, 'PHBR400', 'PHBR400', 'PHBR400', '39', '1', '0', '2024-07-08 18:33:40', '0000-00-00 00:00:00'),
(242, '2,8,11,12,37,39,40', 39, 'PHBR525', '242-phbr525', '<p>PHBR525</p>\r\n', 242, 'Insulated Cables', '123', '', '1.2Ω', '1000Ω', ' ±5%, ±10%', 'Std. < +200 ppm/°C', 60, 295, 'PHBR525', 'PHBR525', 'PHBR525', '39', '1', '0', '2024-07-08 18:33:35', '0000-00-00 00:00:00'),
(243, '2,8,11,12,37,39,40', 39, 'PHBR650', '243-phbr650', '<p>PHBR650</p>\r\n', 243, 'Insulated Cables', '125', '', '1.5Ω', '1000Ω', ' ±5%, ±10%', 'Std. < +200 ppm/°C', 60, 365, 'PHBR650', 'PHBR650', 'PHBR650', '39', '1', '0', '2024-07-08 18:33:30', '0000-00-00 00:00:00'),
(244, '2,8,11,12,37,39,40', 39, 'PHBR1000', '244-phbr1000', '<p>PHBR1000</p>\r\n', 244, 'Insulated Cables', '97', '', '1.8Ω', '1000Ω', ' ±5%, ±10%', 'Std. < +200 ppm/°C', 60, 425, 'PHBR1000', 'PHBR1000', 'PHBR1000', '39', '1', '0', '2024-07-08 18:33:25', '0000-00-00 00:00:00'),
(245, '2,8,11,12,37,39,40', 39, 'PHBR1230', '245-phbr1230', '<p>PHBR1230</p>\r\n', 245, 'Insulated Cables', '127', '', '2.7Ω', '1000Ω', ' ±5%, ±10%', 'Std. < +200 ppm/°C', 60, 525, 'PHBR1230', 'PHBR1230', 'PHBR1230', '39', '1', '0', '2024-07-08 18:33:20', '0000-00-00 00:00:00'),
(246, '2,8,11,12,37,39,40', 39, 'PHBR1475', '246-phbr1475', '<p>PHBR1475</p>\r\n', 246, 'Insulated Cables', '128', '', '3Ω', '1000Ω', ' ±5%, ±10%', 'Std. < +200 ppm/°C', 60, 625, 'PHBR1475', 'PHBR1475', 'PHBR1475', '39', '1', '0', '2024-07-08 18:33:15', '0000-00-00 00:00:00'),
(247, '2,8,11,12,37,39,40', 39, 'PHBR1700', '247-phbr1700', '<p>PHBR1700</p>\r\n', 247, 'Insulated Cables', '129', '', '3.9Ω', '1000Ω', ' ±5%, ±10%', 'Std. < +200 ppm/°C', 60, 725, 'PHBR1700', 'PHBR1700', 'PHBR1700', '39', '1', '0', '2024-07-08 18:33:11', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product_documents`
--

CREATE TABLE `tbl_product_documents` (
  `pdf_id` int(11) NOT NULL,
  `series_id` int(11) NOT NULL,
  `folder` varchar(250) NOT NULL,
  `pdf_detail` text NOT NULL,
  `pdf_file` varchar(250) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_product_documents`
--

INSERT INTO `tbl_product_documents` (`pdf_id`, `series_id`, `folder`, `pdf_detail`, `pdf_file`, `status`) VALUES
(3, 11, '11-1718007722', 'Sheet', 'PVR-v4_1-web-oct04.pdf', '0'),
(4, 4, '4-1718186881', 'Data sheet 1', 'PVAB-V2-web-oct04.pdf', '0'),
(5, 12, '12-1718187516', '', 'PCA-v4-web-oct04-2.pdf', '0'),
(6, 13, '13-1718187785', 'Data sheet 1', 'PBA-v5-web-oct04-2.pdf', '0'),
(7, 14, '14-1718263713', 'Data Sheet', 'PEM-Data-sheet-A4-2.pdf', '0'),
(8, 2, '2-1718265621', 'Datasheet', 'Pgm-dv5b-web-oct04.pdf', '0'),
(9, 15, '15-1718270544', 'Datasheet', 'PGMA-v4-web-oct04.pdf', '0'),
(10, 6, '6-1718274206', 'Datasheet', 'PGR-v4-web-oct04.pdf', '0'),
(12, 17, '17-1718274888', 'DataSheet', 'PBR-v94-2.pdf', '0'),
(13, 5, '5-1718275151', 'Datasheet', 'PYP-v4-web-oct04.pdf', '0'),
(14, 18, '18-1718275427', 'Datasheet', 'pep-2.pdf', '0'),
(15, 19, '19-1718304416', 'Datasheet', 'psp-2.pdf', '0'),
(16, 20, '20-1718348100', 'Datasheet', 'PTE-DS-200115-1.pdf', '0'),
(17, 7, '7-1718348264', '', 'phav10-50-web-Aug22.pdf', '0'),
(18, 8, '8-1718348460', 'Datasheet', 'PQM100204-120906RevB.pdf', '0'),
(19, 21, '21-1718348651', 'Datasheet', 'PVRC-Datasheet.pdf', '0'),
(20, 22, '22-1718348843', 'Datasheet', 'PML-DS23-Web-050505.pdf', '0'),
(21, 24, '24-1718349233', 'datasheet', 'PHF-Series-Datasheet-UL-2018-2.pdf', '0'),
(22, 25, '25-1718353783', 'Datasheet', 'PHBH-_-PHBV-Series-Datasheet.pdf', '0'),
(23, 26, '26-1718353949', 'Datasheet', 'PHCF-Series-Datasheet-UL_Aug20-2.pdf', '0'),
(24, 27, '27-1718354106', 'Datasheet', 'PHCH-PHCV-Series_Datasheet_201125-2.pdf', '0'),
(25, 28, '28-1718354217', 'Datasheet', 'PHEF320-450W-AlumHousedResistor-RevA.pdf', '0'),
(26, 29, '29-1718354415', 'Datasheet', 'EBWD-2.pdf', '0'),
(27, 30, '30-1718354619', 'Datasheet', 'PEBW-LowOhmicSensing-Resistors-Datasheet-Rev-A-2.pdf', '0'),
(28, 31, '31-1718354836', 'Datasheet', 'PSA-Series-Resistor-Datasheet-Rev-B.pdf', '0'),
(29, 32, '32-1718354952', 'Datasheet', 'PSGR500-220814-2.pdf', '0'),
(30, 33, '33-1718355319', 'Datasheet', 'FRH250-400W-220814-2.pdf', '0'),
(31, 35, '35-1718355682', 'Datasheet', 'PUT30-Series-Datasheet-220422-2.pdf', '0'),
(32, 36, '36-1718355887', 'Datasheet', 'PHPTC-Datasheet-Rev-F-211022-2.pdf', '0'),
(33, 37, '37-1718356040', 'Datasheet', 'PVA-v4-web-oct04.pdf', '0'),
(34, 38, '38-1718356160', 'Datasheet', 'PCL-v5-web-oct04-2.pdf', '0'),
(35, 1, '1-1718694201', 'Data sheet', 'PIA_New-Datasheet.pdf', '0'),
(36, 10, '10-1719985055', 'Datasheet', 'PPR-May20.pdf', '0'),
(40, 39, '39-1724407312', '', 'PHBR-Datasheet_050724.pdf', '0'),
(41, 16, '16-1724734751', 'Datasheet', 'pga.pdf', '0');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product_series`
--

CREATE TABLE `tbl_product_series` (
  `ps_id` int(11) NOT NULL,
  `construction_id` varchar(255) NOT NULL,
  `title` varchar(250) NOT NULL,
  `position` int(11) NOT NULL,
  `short_description` text NOT NULL,
  `description` text NOT NULL,
  `slug` varchar(250) NOT NULL,
  `file_folder` varchar(255) NOT NULL,
  `series_image` varchar(250) NOT NULL,
  `show_as_featured` varchar(255) NOT NULL,
  `seo_title` varchar(250) NOT NULL,
  `seo_description` text NOT NULL,
  `seo_keywords` varchar(250) NOT NULL,
  `status` enum('1','0') NOT NULL,
  `created_on` datetime NOT NULL,
  `delete_status` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_product_series`
--

INSERT INTO `tbl_product_series` (`ps_id`, `construction_id`, `title`, `position`, `short_description`, `description`, `slug`, `file_folder`, `series_image`, `show_as_featured`, `seo_title`, `seo_description`, `seo_keywords`, `status`, `created_on`, `delete_status`) VALUES
(1, '2,10,12', 'Silicon Coated Axial Resistor (PIA) ', 1, 'Silicon Coated Axial Resistor (PIA) ', '<ul>\r\n <li>High Temp Silicone Coating.</li>\r\n <li>Close Tolerance, Low TCR.</li>\r\n <li>Non Inductive Versions.</li>\r\n <li>Approved since 1977 to JSS 50402.</li>\r\n <li>High Surge Version Available.</li>\r\n <li>Meets CECC 40201 Specs.</li>\r\n <li>PEC Resistors are RoHS compliant.</li>\r\n</ul>\r\n', '1-silicon-coated-axial-resistor-pia', '1-1720607969', '1718948612_PIA.png', 'off', 'Silicon Coated Axial Resistor (PIA) ', 'Silicon Coated Axial Resistor (PIA) ', 'Silicon Coated Axial Resistor (PIA) ', '1', '2024-07-10 16:09:29', '0'),
(2, '5,17', 'Slotted Ceramic Cased Vertical / Axial Resistor (PGM/PGMD)', 4, 'Slotted Ceramic Cased Vertical / Axial Resistor (PGM/PGMD)', '<ul>\r\n <li>Slotted Ceramic Body.</li>\r\n <li>High Insulation Resistance.</li>\r\n <li>Ceramic or Fibrecore Former.</li>\r\n <li>High Surge Version Available.</li>\r\n <li>Low Temperature Rise.</li>\r\n <li>Non Flammable Construction.</li>\r\n <li>Vertical / Axial mounting options</li>\r\n <li>PEC Resistors are RoHS compliant.</li>\r\n</ul>\r\n', '2-slotted-ceramic-cased-vertical-axial-resistor-pgm-pgmd', '2-1720608646', '1718948679_PGM-PGMD.png', 'off', 'Slotted Ceramic Cased Vertical / Axial Resistor (PGM/PGMD)', 'Slotted Ceramic Cased Vertical / Axial Resistor (PGM/PGMD)', 'Slotted Ceramic Cased Vertical / Axial Resistor (PGM/PGMD)', '1', '2024-07-10 16:20:46', '0'),
(3, '1', 'Silicon Coated Radial Tubular Power Resistor', 3, 'Silicon Coated Radial Tubular Power Resistor', '<ul>\r\n <li>High Temp Silicone Coating.</li>\r\n <li>Close Tolerance, Low TCR.</li>\r\n <li>Non Inductive Versions.</li>\r\n <li>Approved since 1977 to JSS 50402.</li>\r\n <li>High Surge Version Available.</li>\r\n <li>Meets CECC 40201 Specs.</li>\r\n <li>PEC Resistors are RoHS compliant.</li>\r\n</ul>\r\n', '3-silicon-coated-radial-tubular-power-resistor', '3-1718949026', '1718949026_PPRC.png', 'on', 'Silicon Coated Radial Tubular Power Resistor', 'Silicon Coated Radial Tubular Power Resistor', 'Silicon Coated Radial Tubular Power Resistor', '1', '2024-06-21 11:20:26', '0'),
(4, '2,18', 'Vitreous Enamel Axial Resistor Brown (PVAB)', 22, 'Vitreous Enamel Axial Resistor Brown (PVAB)', '<ul>\r\n <li>Impervious Vitreous Enamel.</li>\r\n <li>High Pulse Overload Capability.</li>\r\n <li>Ref. MIL-R-26 Specifications.</li>\r\n <li>USA Form and Fit Design.</li>\r\n <li>Brown Enamel Colour.</li>\r\n <li>Allows High Speed Lead Forming.</li>\r\n <li>PEC Resistors are RoHS compliant.</li>\r\n</ul>\r\n', '4-vitreous-enamel-axial-resistor-brown-pvab', '4-1720608211', '1718949063_PVAB_(2).png', 'off', 'Vitreous Enamel Axial Resistor Brown (PVAB)', 'Vitreous Enamel Axial Resistor Brown (PVAB)', 'Vitreous Enamel Axial Resistor Brown (PVAB)', '1', '2024-07-10 16:13:31', '0'),
(5, '4,12', 'Capacitor Mount Discharge Resistors (PYP)', 12, 'Capacitor Mount Discharge Resistors (PYP)', '<ul>\r\n <li>Direct Mounting On Capacitors.</li>\r\n <li>High Pulse-Withstand Capability.</li>\r\n <li>Stainless Steel Terminals.</li>\r\n <li>Two Mounting Pitches Available.</li>\r\n <li>Moisture Resistant Silicone Coat.</li>\r\n <li>Superior Quality Weld Joints.</li>\r\n <li>PEC Resistors are RoHS compliant.</li>\r\n</ul>\r\n', '5-capacitor-mount-discharge-resistors-pyp', '5-1720608499', '1718949099_PYP.png', 'off', 'Capacitor Mount Discharge Resistors (PYP)', 'Capacitor Mount Discharge Resistors (PYP)', 'Capacitor Mount Discharge Resistors (PYP)', '1', '2024-07-10 16:18:19', '0'),
(6, '12,17', 'Pluggable Fibrecore Silicone Coated Resistors (PGR)', 32, 'Pluggable Fibrecore Silicone Coated Resistors (PGR)', '<ul>\r\n <li>PCB Pluggable Resistor.</li>\r\n <li>High/Low Profile Terminals.</li>\r\n <li>Fibre-core Former.</li>\r\n <li>Low Cost Design.</li>\r\n <li>High Surge Versions Available.</li>\r\n <li>Uncoated Versions Available.</li>\r\n <li>PEC Resistors are RoHS compliant.</li>\r\n</ul>\r\n', '6-pluggable-fibrecore-silicone-coated-resistors-pgr', '6-1720610625', '1718949118_PGR.png', 'off', 'Pluggable Fibrecore Silicone Coated Resistors (PGR)', 'Pluggable Fibrecore Silicone Coated Resistors (PGR)', 'Pluggable Fibrecore Silicone Coated Resistors (PGR)', '1', '2024-07-10 16:53:45', '0'),
(7, '1,6', 'Aluminium Housed Moulded Resistors (PHA)', 9, 'Aluminium Housed Moulded Resistors (PHA)', '<ul>\r\n <li>Moulded into Aluminium Housing.</li>\r\n <li>High Power / Size Ratio</li>\r\n <li>BS CECC 40203 / MIL-R-18546</li>\r\n <li>Gold Anodised Heat Sink</li>\r\n <li>PEC Resistors are RoHS compliant.</li>\r\n</ul>\r\n', '7-aluminium-housed-moulded-resistors-pha', '7-1720613277', '1718949140_PHA.png', 'on', 'Aluminium Housed Moulded Resistors (PHA)', 'Aluminium Housed Moulded Resistors (PHA)', 'Aluminium Housed Moulded Resistors (PHA)', '1', '2024-07-10 17:37:57', '0'),
(8, '5,17', 'Vertical Ceramic Cased Resistors (PQM)', 36, 'Vertical Ceramic Cased Resistors (PQM)', '<ul>\r\n <li>Vertical Boat Ceramic Encased.</li>\r\n <li>High Insulation Resistance.</li>\r\n <li>Salt Fog Withstanding Versions.</li>\r\n <li>High Surge Versions Available.</li>\r\n <li>Non Inductive Resistors Available.</li>\r\n <li>Low TCR Available.</li>\r\n <li>PEC Resistors are RoHS compliant.</li>\r\n</ul>\r\n', '8-vertical-ceramic-cased-resistors-pqm', '8-1720608688', '1718949160_PQM.png', 'off', 'Vertical Ceramic Cased Resistors (PQM)', 'Vertical Ceramic Cased Resistors (PQM)', 'Vertical Ceramic Cased Resistors (PQM)', '1', '2024-07-10 16:21:28', '0'),
(9, '1', 'Compact Fan Heater', 9, 'Compact Fan Heater', '<ul>\r\n <li>High Temp Silicone Coating.</li>\r\n <li>Close Tolerance, Low TCR.</li>\r\n <li>Non Inductive Versions.</li>\r\n <li>Approved since 1977 to JSS 50402.</li>\r\n <li>High Surge Version Available.</li>\r\n <li>Meets CECC 40201 Specs.</li>\r\n <li>PEC Resistors are RoHS compliant.</li>\r\n</ul>\r\n', '9-compact-fan-heater', '9-1718949178', '1718949178_FRH.png', 'off', 'Compact Fan Heater', 'Compact Fan Heater', 'Compact Fan Heater', '1', '2024-06-21 11:22:58', '0'),
(10, '3,12,16', 'Silicone Coated Radial Tubular Power Resistor (PPR)', 7, 'Silicone Coated Radial Tubular Power Resistor (PPR)', '<ul>\r\n <li>High Temp Silicone Coating.</li>\r\n <li>Close Tolerance, Low TCR.</li>\r\n <li>Non Inductive Versions.</li>\r\n <li>Approved since 1977 to JSS 50402.</li>\r\n <li>High Surge Version Available.</li>\r\n <li>Meets CECC 40201 Specs.</li>\r\n <li>PEC Resistors are RoHS compliant.</li>\r\n</ul>\r\n', '10-silicone-coated-radial-tubular-power-resistor-ppr', '10-1720610785', '1718949228_PPR.png', 'off', 'Silicone Coated Radial Tubular Power Resistor (PPR)', 'Silicone Coated Radial Tubular Power Resistor (PPR)', 'Silicone Coated Radial Tubular Power Resistor (PPR)', '1', '2024-07-10 16:56:25', '0'),
(11, '3,16,18', 'Vitreous Enamelled Radial Tubular Power Resistor (PVR)', 5, 'PVR\r\n', '<ul>\r\n <li>Rugged Enamel Coating.</li>\r\n <li>Non Inductive Versions.</li>\r\n <li>Withstands High Short Term Surges.</li>\r\n <li>High Moisture Resistance.</li>\r\n <li>Quick Connect Terminals Available.</li>\r\n <li>Choice of Terminals.</li>\r\n <li>PEC Resistors are RoHS compliant.</li>\r\n</ul>\r\n', '11-vitreous-enamelled-radial-tubular-power-resistor-pvr', '11-1720608447', '1718949257_PVR.png', 'off', 'PVR', 'PVR', 'PVR', '1', '2024-07-10 16:17:27', '0'),
(12, '2,5', 'Square Ceramic Case Axial Resistor (PCA) ', 23, 'Square Ceramic Case Axial Resistor (PCA) ', '<ul>\r\n <li>Square Ceramic Body.</li>\r\n <li>High Insulation Resistance.</li>\r\n <li>Fibre-core Former.</li>\r\n <li>High Surge Versions Available.</li>\r\n <li>Low Temperature Rise.</li>\r\n <li>4W / 5W Available in Taped Form.</li>\r\n <li>PEC Resistors are RoHS compliant.</li>\r\n</ul>\r\n', '12-square-ceramic-case-axial-resistor-pca', '12-1720607800', '1718949279_PCA.png', 'off', 'Square Ceramic Case Axial Resistor (PCA) ', 'Square Ceramic Case Axial Resistor (PCA) ', 'Square Ceramic Case Axial Resistor (PCA) ', '1', '2024-07-10 16:06:40', '0'),
(13, '2,5', 'Boat Ceramic Cased Axial Resistor (PBA)', 29, 'Boat Ceramic Cased Axial Resistor (PBA)', '<ul>\r\n <li>Boat/Bathtub Style Ceramic Case.</li>\r\n <li>High Insulation Resistance.</li>\r\n <li>Salt Fog Withstanding Versions.</li>\r\n <li>High Surge Version Available.</li>\r\n <li>Non Inductive Resistors Available.</li>\r\n <li>Low TCR Available.</li>\r\n <li>PEC Resistors are RoHS compliant.</li>\r\n</ul>\r\n', '13-boat-ceramic-cased-axial-resistor-pba', '13-1720607778', '1718949307_PBA.png', 'off', 'Boat Ceramic Cased Axial Resistor (PBA)', 'Boat Ceramic Cased Axial Resistor (PBA)', 'Boat Ceramic Cased Axial Resistor (PBA)', '1', '2024-07-10 16:06:18', '0'),
(14, '2,12,15', 'Surge Resistors for Energy Meters (PEM)', 2, 'Surge Resistors for Energy Meters (PEM)', '<ul>\r\n <li>Designed for High Voltage Surge Protection.</li>\r\n <li>1.2/50 mS test Wave, upto 12KV.</li>\r\n <li>Protects MOV’s from high Energy Currents.</li>\r\n <li>Flame Proof</li>\r\n <li>RoHS Complaint.</li>\r\n</ul>\r\n', '14-surge-resistors-for-energy-meters-pem', '14-1720607858', '1718949327_PEM.png', 'on', 'Surge Resistors for Energy Meters (PEM)', 'Surge Resistors for Energy Meters (PEM)', 'Surge Resistors for Energy Meters (PEM)', '1', '2024-07-10 16:07:38', '0'),
(15, '2,5', 'Ceramic Case Axial Resistor With Slotted Ceramic (PGMA)', 30, 'Ceramic Case Axial Resistor With Slotted Ceramic (PGMA)', '<ul>\r\n <li>Slotted Ceramic Body.</li>\r\n <li>High Insulation Resistance.</li>\r\n <li>Ceramic or Fibrecore Former.</li>\r\n <li>High Surge Versions Available.</li>\r\n <li>Low Temperature Rise.</li>\r\n <li>Non Flammable Construction.</li>\r\n <li>PEC Resistors are RoHS compliant.</li>\r\n</ul>\r\n', '15-ceramic-case-axial-resistor-with-slotted-ceramic-pgma', '15-1720607908', '1718949362_PGMA.png', 'off', 'Ceramic Case Axial Resistor With Slotted Ceramic (PGMA)', 'Ceramic Case Axial Resistor With Slotted Ceramic (PGMA)', 'Ceramic Case Axial Resistor With Slotted Ceramic (PGMA)', '1', '2024-07-10 16:08:28', '0'),
(16, '2,12', 'Silicone Coated Axial Fibrecore Resistors (PGA)', 31, 'Silicone Coated Axial Fibrecore Resistors (PGA)', '<ul>\r\n <li>Silicone Coated.</li>\r\n <li>Fibre-core Former.</li>\r\n <li>Crimped Contacts.</li>\r\n <li>Shatter Proof Design.</li>\r\n <li>Low Cost.</li>\r\n <li>PEC Resistors are RoHS compliant.</li>\r\n</ul>\r\n', '16-silicone-coated-axial-fibrecore-resistors-pga', '16-1724734751', '1718949391_PGA.png', 'off', 'Silicone Coated Axial Fibrecore Resistors (PGA)', 'Silicone Coated Axial Fibrecore Resistors (PGA)', 'Silicone Coated Axial Fibrecore Resistors (PGA)', '1', '2024-08-27 10:29:11', '0'),
(17, '5,17', 'Boat Ceramic Cased Radial Resistors (PBR)', 33, 'Boat Ceramic Cased Radial Resistors (PBR)', '<ul>\r\n <li>Boat Ceramic Encased.</li>\r\n <li>High Insulation Resistance.</li>\r\n <li>High Surge Version Available.</li>\r\n <li>Non Inductive Versions Available.</li>\r\n <li>Low TCR Available.</li>\r\n <li>Quick Connect Terminals Available.</li>\r\n <li>PEC Resistors are RoHS compliant.</li>\r\n</ul>\r\n', '17-boat-ceramic-cased-radial-resistors-pbr', '17-1720608568', '1718949427_PBR.png', 'off', 'Boat Ceramic Cased Radial Resistors (PBR)', 'Boat Ceramic Cased Radial Resistors (PBR)', 'Boat Ceramic Cased Radial Resistors (PBR)', '1', '2024-07-10 16:19:28', '0'),
(18, '2,10', 'Moulded High Precision Resistors (PEP)', 34, 'Moulded High Precision Resistors (PEP)', '<ul>\r\n <li>Multilayer Precision Wound.</li>\r\n <li>Moulded Case Protection.</li>\r\n <li>High Stability Reference Resistor.</li>\r\n <li>Low Inductance Winding.</li>\r\n <li>High Resistance Values.</li>\r\n <li>Close Tolerance upto 0.01%.</li>\r\n <li>PEC Resistors are RoHS compliant.</li>\r\n</ul>\r\n', '18-moulded-high-precision-resistors-pep', '18-1720610433', '1718949474_PEP.png', 'off', 'Moulded High Precision Resistors (PEP)', 'Moulded High Precision Resistors (PEP)', 'Moulded High Precision Resistors (PEP)', '1', '2024-07-10 16:50:33', '0'),
(19, '2,10,12', 'Silicone Coated Axial Precision Resistors (PSP)', 35, 'Silicone Coated Axial Precision Resistors (PSP)', '<ul>\r\n <li>High Temp. Silicone Coating.</li>\r\n <li>Close Tolerance, Low TCR.</li>\r\n <li>Non Inductive Versions.</li>\r\n <li>Low Temperature Rise.</li>\r\n <li>High Stability.</li>\r\n <li>Suitable for Instrumentation.</li>\r\n <li>PEC Resistors are RoHS compliant.</li>\r\n</ul>\r\n', '19-silicone-coated-axial-precision-resistors-psp', '19-1720608060', '1719553946_PSP-300x300.jpg', 'off', 'Silicone Coated Axial Precision Resistors (PSP)', 'Silicone Coated Axial Precision Resistors (PSP)', 'Silicone Coated Axial Precision Resistors (PSP)', '1', '2024-07-10 16:11:00', '0'),
(20, '2,9', 'High Voltage Thick Film Axial Resistors (PTE)', 10, 'High Voltage Thick Film Axial Resistors (PTE)', '<ul>\r\n <li>High Voltage Thick Film Resistor</li>\r\n <li>Non Inductive Axial Construction</li>\r\n <li>Voltage Rating from 2KV to 48KV in Free Air.</li>\r\n <li>Power Rating from 0.3W to 17W</li>\r\n <li>Epoxy Coated for Excellent Humidity Protection.</li>\r\n <li>Resistance Range from 200R to 700Meg.</li>\r\n</ul>\r\n', '20-high-voltage-thick-film-axial-resistors-pte', '20-1720608158', '1718949871_PTE.png', 'off', 'High Voltage Thick Film Axial Resistors (PTE)', 'High Voltage Thick Film Axial Resistors (PTE)', 'High Voltage Thick Film Axial Resistors (PTE)', '1', '2024-07-10 16:12:38', '0'),
(21, '3,16,18', 'Vitreous Enamelled Radial Tubular Edge Wound Resistor (PVRC)', 6, 'Vitreous Enamelled Radial Tubular Edge Wound Resistor (PVRC)', '<ul>\r\n <li>Rugged Enamel Coating.</li>\r\n <li>Edge Winding for Higher Power.</li>\r\n <li>Withstands High Short Term Surges.</li>\r\n <li>Suitable for Motor Control.</li>\r\n <li>Quick Connect Terminals Available.</li>\r\n <li>Choice of Terminals.</li>\r\n <li>PEC Resistors are RoHS compliant.</li>\r\n</ul>\r\n', '21-vitreous-enamelled-radial-tubular-edge-wound-resistor-pvrc', '21-1720608472', '1718949934_PVRC.png', 'off', 'Vitreous Enamelled Radial Tubular Edge Wound Resistor (PVRC)', 'Vitreous Enamelled Radial Tubular Edge Wound Resistor (PVRC)', 'Vitreous Enamelled Radial Tubular Edge Wound Resistor (PVRC)', '1', '2024-07-10 16:17:52', '0'),
(22, '2,7', 'Moulded Current Sense Resistor (PML)', 11, 'Moulded Current Sense Resistor (PML)', '<ul>\r\n <li>Very Low Ohmic Values.</li>\r\n <li>Non Inductive Construction <20nH></li>\r\n <li>For Current Sensing / HF Circuits.</li>\r\n <li>Epoxy Moulded Casing.</li>\r\n <li>High Moisture Resistance.</li>\r\n <li>High Strength Weld Joints.</li>\r\n <li>PEC Resistors are RoHS compliant.</li>\r\n</ul>\r\n', '22-moulded-current-sense-resistor-pml', '22-1720608035', '1718949955_PML.png', 'off', 'Moulded Current Sense Resistor (PML)', 'Moulded Current Sense Resistor (PML)', 'Moulded Current Sense Resistor (PML)', '1', '2024-07-10 16:10:35', '0'),
(23, '2,12', 'Joule Rated Resistors (J)', 37, 'Joule Rated Resistors (J)', '<ul>\r\n <li>Designed for absorbing high energy pulses.</li>\r\n <li>Fixed joule ratings available.</li>\r\n <li>Many different sizes available.</li>\r\n <li>Can cross to ceramic composition resistors.</li>\r\n <li>RoHs compliant</li>\r\n</ul>\r\n', '23-joule-rated-resistors-j', '23-1720610595', '1718949987_J.png', 'off', 'Joule Rated Resistors (J)', 'Joule Rated Resistors (J)', 'Joule Rated Resistors (J)', '1', '2024-07-10 16:53:15', '0'),
(24, '1,3,6', 'Low Profile Aluminium Housed Braking Resistors (PHF)', 16, 'Low Profile Aluminium Housed Braking Resistors (PHF)', '<ul>\r\n <li>Low profile heat sinkable resistor</li>\r\n <li>low inductance flat winding</li>\r\n <li>Low cost</li>\r\n <li>designed for braking dc drives.</li>\r\n</ul>\r\n', '24-low-profile-aluminium-housed-braking-resistors-phf', '24-1720608344', '1718950020_PHF.png', 'on', 'Low Profile Aluminium Housed Braking Resistors (PHF)', 'Low Profile Aluminium Housed Braking Resistors (PHF)', 'Low Profile Aluminium Housed Braking Resistors (PHF)', '1', '2024-07-10 16:15:44', '0'),
(25, '1,3,6', 'High Power Aluminium Housed Braking Resistors (PHBH/PHBV)', 14, 'High Power Aluminium Housed Braking Resistors (PHBH/PHBV)', '<ul>\r\n <li>Aluminium Housed Resistor (21mm x 40mm Profile)</li>\r\n <li>High Energy Absorbtion Capability</li>\r\n <li>Suitable for Motor Braking High Inrush Absorbtion</li>\r\n <li>Application in EV’s,Fuel Cell Vehicle.</li>\r\n</ul>\r\n', '25-high-power-aluminium-housed-braking-resistors-phbh-phbv', '25-1720608252', '1718950051_PHBH-PHBV.png', 'off', 'High Power Aluminium Housed Braking Resistors (PHBH/PHBV)', 'High Power Aluminium Housed Braking Resistors (PHBH/PHBV)', 'High Power Aluminium Housed Braking Resistors (PHBH/PHBV)', '1', '2024-07-10 16:14:12', '0'),
(26, '1,3,6', 'Flat Aluminium Housed Braking Resistors (PHCF)', 13, 'Flat Aluminium Housed Braking Resistors (PHCF)', '<ul>\r\n <li>Low Profile &#40;15mm&#41; Aluminium Housing.</li>\r\n <li>Low Inductance flat winding</li>\r\n <li>Heat Energy Absorbtion Capability</li>\r\n <li>Applications In Motor Braking and High Inrush Absorbtion</li>\r\n <li>Space Heating Versions Available.</li>\r\n</ul>\r\n', '26-flat-aluminium-housed-braking-resistors-phcf', '26-1720608274', '1718950075_PHCF.png', 'on', 'Flat Aluminium Housed Braking Resistors (PHCF)', 'Flat Aluminium Housed Braking Resistors (PHCF)', 'Flat Aluminium Housed Braking Resistors (PHCF)', '1', '2024-07-10 16:14:34', '0'),
(27, '1,3', 'High Power Aluminium Housed Braking Resistors (PHCH-PHCV)', 15, 'High Power Aluminium Housed Braking Resistors (PHCH-PHCV)', '<ul>\r\n <li>Aluminum Hosed Resistor (31mm x60mm Profile)</li>\r\n <li>High Absorbtion Capability</li>\r\n <li>Suitable For Motor Braking and High Inrush Absorbtion</li>\r\n <li>Applications in EV’s,Fuel Cell Vehicles.</li>\r\n</ul>\r\n', '27-high-power-aluminium-housed-braking-resistors-phch-phcv', '27-1720608294', '1718950108_PHCH-PHCV.png', 'on', 'High Power Aluminium Housed Braking Resistors (PHCH-PHCV)', 'High Power Aluminium Housed Braking Resistors (PHCH-PHCV)', 'High Power Aluminium Housed Braking Resistors (PHCH-PHCV)', '1', '2024-07-10 16:14:54', '0'),
(28, '1,3', 'High Power Aluminium Housed Finned Braking Resistors (PHEF)', 18, 'High Power Aluminium Housed Finned Braking Resistors (PHEF)', '<ul>\r\n <li>Aluminium Housed Resistor (90mm x 47mm FinnedProfile)</li>\r\n <li>High Power In Shorter Length</li>\r\n <li>High Overload Capacity</li>\r\n <li>Sutable for Motor Drives for Braking and Energy</li>\r\n <li>Absorbtion.</li>\r\n</ul>\r\n', '28-high-power-aluminium-housed-finned-braking-resistors-phef', '28-1720608314', '1718950141_PHEF.png', 'off', 'High Power Aluminium Housed Finned Braking Resistors (PHEF)', 'High Power Aluminium Housed Finned Braking Resistors (PHEF)', 'High Power Aluminium Housed Finned Braking Resistors (PHEF)', '1', '2024-07-10 16:15:14', '0'),
(29, '7,14', 'E-beam Welded, Current Sense, Surface Mount Shunt Resistors (EBWD)', 27, 'E-beam Welded, Current Sense, Surface Mount Shunt Resistors (EBWD)', '<ul>\r\n <li>E-Beam Welded Current Shunt.</li>\r\n <li>Low ohm Shunt For Accurate Sensing.</li>\r\n <li>Resistance Range from 1mOhm to 50mOhm.</li>\r\n <li>Power Rating from 2W to 5W.</li>\r\n <li>High Current Overloads Possible.</li>\r\n <li>Space Saving Shape on PCB.</li>\r\n</ul>\r\n', '29-e-beam-welded-current-sense-surface-mount-shunt-resistors-ebwd', '29-1720608781', '1718950192_EBWD.png', 'off', 'E-beam Welded, Current Sense, Surface Mount Shunt Resistors (EBWD)', 'E-beam Welded, Current Sense, Surface Mount Shunt Resistors (EBWD)', 'E-beam Welded, Current Sense, Surface Mount Shunt Resistors (EBWD)', '1', '2024-07-10 16:23:01', '0'),
(30, '7,14', 'E-beam Welded, Current Sense, Surface Mount Shunt Resistors (PEBW)', 28, 'E-beam Welded, Current Sense, Surface Mount Shunt Resistors (PEBW)', '<ul>\r\n <li>E-Beam Welded Current Shunt.</li>\r\n <li>Low ohm Shunt For Accurate Sensing.</li>\r\n <li>Resistance Range from 0.2mOhm to 10mOhm.</li>\r\n <li>Power Rating from 1W to 10W.</li>\r\n <li>Current Rating upto 129Amps</li>\r\n <li>High Current Overloads Possible.</li>\r\n</ul>\r\n', '30-e-beam-welded-current-sense-surface-mount-shunt-resistors-pebw', '30-1720608820', '1718950217_PEBW.png', 'off', 'E-beam Welded, Current Sense, Surface Mount Shunt Resistors (PEBW)', 'E-beam Welded, Current Sense, Surface Mount Shunt Resistors (PEBW)', 'E-beam Welded, Current Sense, Surface Mount Shunt Resistors (PEBW)', '1', '2024-07-10 16:23:40', '0'),
(31, '8,12', 'EMI Supression Leadless Resistors (PSA)', 21, 'EMI Supression Leadless Resistors (PSA)', '<ul>\r\n <li>EMI Suppression resistor.</li>\r\n <li>Used in automotive ignition circuits</li>\r\n <li>High voltage withstand (30KV)</li>\r\n <li>wire wound, high pulse designs</li>\r\n <li>Ceramic former construciton for ruggedness</li>\r\n <li>high temperature silicone coating</li>\r\n <li>Stainless steel terminals for environmental protection.</li>\r\n <li>Rohs compliant</li>\r\n</ul>\r\n', '31-emi-supression-leadless-resistors-psa', '31-1720608884', '1718950240_PSA.png', 'off', 'EMI Supression Leadless Resistors (PSA)', 'EMI Supression Leadless Resistors (PSA)', 'EMI Supression Leadless Resistors (PSA)', '1', '2024-07-10 16:24:44', '0'),
(32, '13', 'Steel Grid Resistors (PSGR)', 25, 'Steel Grid Resistors (PSGR)', '<ul>\r\n <li>Steel Grid Design</li>\r\n <li>Low Inductance, High Power</li>\r\n <li>Suitable for High Current Applications</li>\r\n <li>Rugged, Long Life Design for Very long life Applications</li>\r\n</ul>\r\n', '32-steel-grid-resistors-psgr', '32-1720610830', '1718950264_PGSR.png', 'off', 'Steel Grid Resistors (PSGR)', 'Steel Grid Resistors (PSGR)', 'Steel Grid Resistors (PSGR)', '1', '2024-07-10 16:57:10', '0'),
(33, '6', 'Compact Fan Heater (FRH)', 19, 'Compact Fan Heater (FRH)', '<ul>\r\n <li>High Reliability Fan Heater</li>\r\n <li>Suitable For Long Life Applications</li>\r\n <li>Overtemperature Protection</li>\r\n <li>UL Approved Models</li>\r\n <li>No Current Spike at Switch On</li>\r\n <li>250W/400W Versions</li>\r\n <li>PEC Heaters are RoHS Complaint.</li>\r\n</ul>\r\n', '33-compact-fan-heater-frh', '33-1720608745', '1718950308_FRH.png', 'off', 'Compact Fan Heater (FRH)', 'Compact Fan Heater (FRH)', 'Compact Fan Heater (FRH)', '1', '2024-07-10 16:22:25', '0'),
(34, '3,12,16', 'Silicone Coated Radial Tubular Edge Wound Resistor (PPRC)', 8, 'Silicone Coated Radial Tubular Edge Wound Resistor (PPRC)', '<ul>\r\n <li>High Temperature Silicon Coating.</li>\r\n <li>Edge Winding for Higher Power.</li>\r\n <li>Withstands High Short Term Surges.</li>\r\n <li>Suitable for Motor Control.</li>\r\n <li>Choice for Terminal.</li>\r\n <li>Many Cutoms Options of Power Rating and Size Possible.</li>\r\n</ul>\r\n', '34-silicone-coated-radial-tubular-edge-wound-resistor-pprc', '34-1720608422', '1718950332_PPRC.png', 'off', 'Silicone Coated Radial Tubular Edge Wound Resistor (PPRC)', 'Silicone Coated Radial Tubular Edge Wound Resistor (PPRC)', 'Silicone Coated Radial Tubular Edge Wound Resistor (PPRC)', '1', '2024-07-10 16:17:02', '0'),
(35, '9,16', 'Ultra High Voltage Thick Film Tubular Resistors (PUT)', 26, 'Ultra High Voltage Thick Film Tubular Resistors (PUT)', '<ul>\r\n <li>High Voltage Thick Film Resistor.</li>\r\n <li>Non Inductive Tubular Construction.</li>\r\n <li>Ultra High Voltage and High Resistance Value Combination.</li>\r\n <li>Voltage Rating from 40KV to 100KV in Free Air.</li>\r\n <li>Power Rating from 20W to 150W.</li>\r\n <li>Epoxy Coated for Excellent Humidity Protection.</li>\r\n <li>Resistance Range from 1Kohm 1GigaOhm.</li>\r\n</ul>\r\n', '35-ultra-high-voltage-thick-film-tubular-resistors-put', '35-1720608922', '1718950430_PUT.png', 'off', 'Ultra High Voltage Thick Film Tubular Resistors (PUT)', 'Ultra High Voltage Thick Film Tubular Resistors (PUT)', 'Ultra High Voltage Thick Film Tubular Resistors (PUT)', '1', '2024-07-10 16:25:22', '0'),
(36, '1,3,11', 'PTC Aluminium Housed Braking Resistors (PHPTC)', 20, 'PTC Aluminium Housed Braking Resistors (PHPTC)', '<ul>\r\n <li>PTC Element Braking Resistor</li>\r\n <li>Compact Aluminium Housing</li>\r\n <li>High Overload Pulse Capability</li>\r\n <li>Limited Rise with Self protecting PTC Element</li>\r\n <li>Four Power Rating from 35W to 14W.</li>\r\n</ul>\r\n', '36-ptc-aluminium-housed-braking-resistors-phptc', '36-1720608364', '1720504786_php.jpg', 'off', 'Ptc Aluminium Housed Braking Resistors (PHPTC)', 'Ptc Aluminium Housed Braking Resistors (PHPTC)', 'Ptc Aluminium Housed Braking Resistors (PHPTC)', '1', '2024-07-10 16:16:04', '0'),
(37, '2,18', 'Vitreous Enamel Axial Resistor (PVA)', 3, 'Vitreous Enamel Axial Resistor (PVA)', '<ul>\r\n <li>Impervious Vitreous Enamel.</li>\r\n <li>High Pulse Overload Capability.</li>\r\n <li>Ref. CECC-40201 Specifications.</li>\r\n <li>Meets JSS-50402 specifications.</li>\r\n <li>Green Enamel Colour.</li>\r\n <li>Allows High Speed Lead Forming.</li>\r\n <li>PEC Resistors are RoHS compliant.</li>\r\n</ul>\r\n', '37-vitreous-enamel-axial-resistor-pva', '37-1720608224', '1718950481_PVA.png', 'off', 'Vitreous Enamel Axial Resistor (PVA)', 'Vitreous Enamel Axial Resistor (PVA)', 'Vitreous Enamel Axial Resistor (PVA)', '1', '2024-07-10 16:13:44', '0'),
(38, '2,5,7', 'Ceramic Case Current Sense Resistor (PCL)', 24, 'Ceramic Case Current Sense Resistor (PCL)', '<ul>\r\n <li>Very Low Ohmic Values.</li>\r\n <li>Non Inductive Construction <20nH></li>\r\n <li>For Current Sensing / HF Circuits.</li>\r\n <li>High Strength Weld Joints.</li>\r\n <li>Low Temperature Rise.</li>\r\n <li>Non Flammable Construction.</li>\r\n <li>PEC Resistors are RoHS compliant.</li>\r\n</ul>\r\n', '38-ceramic-case-current-sense-resistor-pcl', '38-1720607827', '1718950498_PCL.png', 'off', 'Ceramic Case Current Sense Resistor (PCL)', 'Ceramic Case Current Sense Resistor (PCL)', 'Ceramic Case Current Sense Resistor (PCL)', '1', '2024-07-10 16:07:07', '0'),
(39, '1,3', 'High Power Finned Aluminium Housed Resistor (PHBR)', 17, 'High Power Finned Aluminium Housed Resistor (PHBR)', '<ul>\r\n <li>Power Rating from 315W to 1700W</li>\r\n <li>Finned Compact Heatsink (90x60mm)</li>\r\n <li>High Overload Capability (Max 105KJ)</li>\r\n <li>Excellent Design for Forced Air Cooling</li>\r\n</ul>\r\n', '39-high-power-finned-aluminium-housed-resistor-phbr', '39-1724407312', '1720075571_PHBR_Vertical_Mounting.png', 'on', 'High Power Finned Aluminium Housed Resistor (PHBR)', 'High Power Finned Aluminium Housed Resistor (PHBR)', 'High Power Finned Aluminium Housed Resistor (PHBR)', '1', '2024-08-23 15:31:52', '0');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_quotation`
--

CREATE TABLE `tbl_quotation` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` longtext NOT NULL,
  `message` longtext NOT NULL,
  `product_data` text NOT NULL,
  `created_on` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_quotation`
--

INSERT INTO `tbl_quotation` (`id`, `name`, `email`, `address`, `message`, `product_data`, `created_on`) VALUES
(1, 'Ashita K', 'ashita.kumawat@technokeens.com', 'pune', 'hello', '[{\"product_id\":\"1\",\"series_id\":\"1\",\"product_image\":\"https:\\/\\/photosyntesis.com\\/pec-website\\/uploads\\/series\\/1716978102_p3.png\",\"product_name\":\"1\",\"series_name\":\"Silicon Coated Axial Resistor\",\"application_id\":\"1\",\"qty\":\"1\"}]', '2024-05-29 19:24:50'),
(2, 'sagar', 'sagar.gaidhani@technokeens.com', 'Mumbai', 'muumbai', '[{\"product_id\":\"1\",\"series_id\":\"1\",\"product_image\":\"https:\\/\\/photosyntesis.com\\/pec-website\\/uploads\\/series\\/1716978102_p3.png\",\"product_name\":\"1\",\"series_name\":\"Silicon Coated Axial Resistor\",\"application_id\":\"1\",\"qty\":\"1\"},{\"product_id\":\"6\",\"series_id\":\"9\",\"product_image\":\"https:\\/\\/photosyntesis.com\\/pec-website\\/uploads\\/series\\/1716993877_image_5_(4).png\",\"product_name\":\"1\",\"series_name\":\"Compact Fan Heater\",\"application_id\":\"1,2\",\"qty\":\"1\"},{\"product_id\":\"4\",\"series_id\":\"2\",\"product_image\":\"https:\\/\\/photosyntesis.com\\/pec-website\\/uploads\\/series\\/1716978417_product_1.png\",\"product_name\":\"1\",\"series_name\":\"Slotted Ceramic Cased Vertical\\/ Axial Resistor\",\"application_id\":\"1,2\",\"qty\":\"1\"}]', '2024-06-03 13:47:01'),
(3, 'sagar', 'sagar.gaidhani@technokeens.com', 'mumbai', 'mumbai', '[{\"product_id\":\"3\",\"series_id\":\"2\",\"product_image\":\"https:\\/\\/photosyntesis.com\\/pec-website\\/uploads\\/series\\/1716978417_product_1.png\",\"product_name\":\"7\",\"series_name\":\"Slotted Ceramic Cased Vertical\\/ Axial Resistor\",\"application_id\":\"4,6\",\"qty\":\"7\"}]', '2024-06-03 13:47:55'),
(4, 'Ashita K', 'ashita.kumawat@technokeens.com', 'Pune', 'hello', '[{\"product_id\":\"3\",\"series_id\":\"2\",\"product_image\":\"https:\\/\\/photosyntesis.com\\/pec-website\\/uploads\\/series\\/1716978417_product_1.png\",\"product_name\":\"BA2\",\"series_name\":\"Slotted Ceramic Cased Vertical\\/ Axial Resistor\",\"application_id\":\"4,6\",\"qty\":\"1\"}]', '2024-06-04 16:55:20'),
(5, 'Pratibha Shirsath', 'pratibha.shirsath@technokeens.com', 'Nashik', 'Hiii', '[{\"product_id\":\"10\",\"series_id\":\"10\",\"product_image\":\"https:\\/\\/photosyntesis.com\\/pec-website\\/uploads\\/series\\/1717565431_product_2.png\",\"product_name\":\"PRA1\",\"series_name\":\"PPR\",\"application_id\":\"7\",\"qty\":\"1\"}]', '2024-06-05 11:13:14'),
(6, 'Ashita', 'ashita.kumawat@technokeens.com', 'Pune', 'testing', '[{\"product_id\":\"31\",\"series_id\":\"4\",\"product_image\":\"https:\\/\\/photosyntesis.com\\/pec-website\\/uploads\\/series\\/1718187051_PVA-B.JPG\",\"product_name\":\"V3B\",\"series_name\":\"Vitreous Enamel Axial Resistor Brown (PVAB)\",\"application_id\":\"8,9,11,14,18,19,20,21\",\"qty\":\"1\"}]', '2024-06-18 13:47:10'),
(7, 'Ashita K', 'ashita.kumawat@technokeens.com', 'Pune', 'Testing final Product', '[{\"product_id\":\"31\",\"series_id\":\"4\",\"product_image\":\"https:\\/\\/photosyntesis.com\\/pec-website\\/uploads\\/series\\/1718187051_PVA-B.JPG\",\"product_name\":\"V3B\",\"series_name\":\"Vitreous Enamel Axial Resistor Brown (PVAB)\",\"application_id\":\"8,9,11,14,18,19,20,21\",\"qty\":\"2\"},{\"product_id\":\"233\",\"series_id\":\"37\",\"product_image\":\"https:\\/\\/photosyntesis.com\\/pec-website\\/uploads\\/series\\/1718356040_PVA.png\",\"product_name\":\"V3\",\"series_name\":\"Vitreous Enamel Axial Resistor (PVA)\",\"application_id\":\"8,9,11,14,18,19,20,21\",\"qty\":\"5\"}]', '2024-06-18 15:24:45'),
(8, 'Rajiv', 'vrajiv@peccomponents.com', 'test', 'test ', '[{\"product_id\":\"31\",\"series_id\":\"4\",\"product_image\":\"https:\\/\\/photosyntesis.com\\/pec-website\\/uploads\\/series\\/1718187051_PVA-B.JPG\",\"product_name\":\"V3B\",\"series_name\":\"Vitreous Enamel Axial Resistor Brown (PVAB)\",\"application_id\":\"8,9,11,14,18,19,20,21\",\"qty\":\"1000\"}]', '2024-06-20 12:03:25'),
(9, 'Sagar', 'sagartechnokeens@gmail.com', 'nashik', 'hi', '[{\"product_id\":\"135\",\"series_id\":\"5\",\"product_image\":\"https:\\/\\/photosyntesis.com\\/pec-website\\/uploads\\/series\\/1718949099_PYP.png\",\"product_name\":\"PYP10\",\"series_name\":\"Capacitor Mount Discharge Resistors (PYP)\",\"application_id\":\"9,10\",\"qty\":\"1\"},{\"product_id\":\"239\",\"series_id\":\"38\",\"product_image\":\"https:\\/\\/photosyntesis.com\\/pec-website\\/uploads\\/series\\/1718950498_PCL.png\",\"product_name\":\"PCL5\",\"series_name\":\"Ceramic Case Current Sense Resistor (PCL)\",\"application_id\":\"11,16,19,42\",\"qty\":\"1\"},{\"product_id\":\"176\",\"series_id\":\"31\",\"product_image\":\"https:\\/\\/photosyntesis.com\\/pec-website\\/uploads\\/series\\/1718950240_PSA.png\",\"product_name\":\"P3B\",\"series_name\":\"EMI Supression Leadless Resistors (PSA)\",\"application_id\":\"1,43\",\"qty\":\"1\"}]', '2024-07-10 18:02:59');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_slider`
--

CREATE TABLE `tbl_slider` (
  `id` int(10) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1',
  `image` varchar(150) NOT NULL,
  `url_button_label` varchar(255) NOT NULL,
  `url` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_slider`
--

INSERT INTO `tbl_slider` (`id`, `title`, `description`, `status`, `image`, `url_button_label`, `url`) VALUES
(1, 'Precision Electronic Component  Manufacturers Since 1972', '<p>We have delivered over a Billion high-power resistors to customers globally which have been highly reliable and have negligible field failure rates. &nbsp;We work with Global Fortune 100 companies to design and deliver resistors for their most demanding applications.</p>', '1', 'slider1.png', '', 'https://photosyntesis.com/pec-website/product'),
(2, 'Precision Electronic Component  Manufacturers Since 1972', '<p>We have delivered over a Billion high-power resistors to customers globally which have been highly reliable and have negligible field failure rates. &nbsp;We work with Global Fortune 100 companies to design and deliver resistors for their most demanding applications.</p>', '1', 'Slide_2_(1).jpg', '', 'https://photosyntesis.com/pec-website/product'),
(3, 'Precision Electronic Component  Manufacturers Since 1972', '<p>We have delivered over a Billion high-power resistors to customers globally which have been highly reliable and have negligible field failure rates. &nbsp;We work with Global Fortune 100 companies to design and deliver resistors for their most demanding applications.</p>', '1', 'motherboard-circuit-background.jpg', '', 'https://photosyntesis.com/pec-website/product'),
(4, 'Precision Electronic Component  Manufacturers Since 1972', '<p>We have delivered over a Billion high-power resistors to customers globally which have been highly reliable and have negligible field failure rates. &nbsp;We work with Global Fortune 100 companies to design and deliver resistors for their most demanding applications.</p>', '1', 'slider-1724158479.jpg', '', 'https://photosyntesis.com/pec-website/product'),
(5, 'Precision Electronic Component  Manufacturers Since 1972', '<p>We have delivered over a Billion high-power resistors to customers globally which have been highly reliable and have negligible field failure rates. &nbsp;We work with Global Fortune 100 companies to design and deliver resistors for their most demanding applications.</p>', '1', 'slider-1724158529.jpg', '', 'https://photosyntesis.com/pec-website/product');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_master`
--

CREATE TABLE `tbl_user_master` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `user_name` varchar(200) NOT NULL,
  `user_type` enum('user') NOT NULL,
  `company_name` varchar(250) NOT NULL,
  `business_sector` varchar(250) NOT NULL,
  `post_code` varchar(250) NOT NULL,
  `mobile_no` varchar(250) NOT NULL,
  `reg_date` datetime NOT NULL,
  `last_login` datetime NOT NULL,
  `password` varchar(250) NOT NULL,
  `profile_image` text NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_user_master`
--

INSERT INTO `tbl_user_master` (`id`, `name`, `user_name`, `user_type`, `company_name`, `business_sector`, `post_code`, `mobile_no`, `reg_date`, `last_login`, `password`, `profile_image`, `status`) VALUES
(1, 'Gaurav Jadhav', 'gaurav.jadhav@technokeens.com', 'user', 'J and J', 'Architects', '422011', '9168085070', '2018-03-16 13:12:53', '2018-03-21 14:32:46', 'e10adc3949ba59abbe56e057f20f883e', '1_logo.jpg', '1'),
(2, 'Prabhas', 'prabhas@gmail.com', 'user', 'Prabhas seeds', 'Agriculture Services', '422011', '1234567890', '2018-03-17 06:47:20', '2018-03-17 13:31:06', '910be72d22e04e452347184adfc658cd', '2_logo.png', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_website_setting`
--

CREATE TABLE `tbl_website_setting` (
  `wid` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `logo` varchar(500) NOT NULL,
  `webemail` varchar(250) NOT NULL,
  `subemail` varchar(250) NOT NULL,
  `timezone` varchar(150) NOT NULL,
  `script` varchar(1000) NOT NULL,
  `status` enum('on','off') NOT NULL COMMENT '0=block 1=unblock',
  `schedule_status` enum('on','off') NOT NULL,
  `seo_title` varchar(150) NOT NULL,
  `seo_keywords` varchar(150) NOT NULL,
  `seo_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_website_setting`
--

INSERT INTO `tbl_website_setting` (`wid`, `title`, `logo`, `webemail`, `subemail`, `timezone`, `script`, `status`, `schedule_status`, `seo_title`, `seo_keywords`, `seo_description`) VALUES
(1, 'Precision Electronic Components', 'peclogo.png', 'ashita.kumawat@technokeens.com', 'admin@technokeens.com', '2024-08-23', '                           Precision Electronic Components                         ', 'on', 'off', 'Precision Electronic Components', 'Precision Electronic Components', 'Precision Electronic Components');

-- --------------------------------------------------------

--
-- Table structure for table `value_store`
--

CREATE TABLE `value_store` (
  `id` int(10) UNSIGNED NOT NULL,
  `thekey` varchar(50) NOT NULL,
  `value` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `value_store`
--

INSERT INTO `value_store` (`id`, `thekey`, `value`) VALUES
(1, 'tech_thumb_width', '80'),
(2, 'tech_thumb_height', '80'),
(3, 'tech_large_width', '530'),
(4, 'tech_large_height', '464'),
(5, 'cat_thumb_width', '80'),
(6, 'cat_thumb_height', '80'),
(7, 'cat_large_width', '500'),
(8, 'cat_large_height', '500'),
(9, 'work_thumb_width', '80'),
(10, 'work_thumb_height', '80'),
(11, 'work_large_width', '500'),
(12, 'work_large_height', '500'),
(13, 'series_thumb_width', '150'),
(14, 'series_thumb_height', '150'),
(15, 'series_large_width', '300'),
(16, 'series_large_height', '300'),
(17, 'brand_thumb_width', '80'),
(18, 'brand_thumb_height', '80'),
(19, 'brand_large_width', '245'),
(20, 'brand_large_height', '350'),
(21, 'prod_thumb_width', '80'),
(22, 'prod_thumb_height', '80'),
(23, 'prod_large_width', '500'),
(24, 'prod_large_height', '500'),
(25, 'size_thumb_width', '80'),
(26, 'size_thumb_height', '80'),
(27, 'size_large_width', '500'),
(28, 'size_large_height', '500'),
(29, 'news_thumb_width', ''),
(30, 'news_thumb_height', ''),
(31, 'news_large_width', ''),
(32, 'news_large_height', '');

-- --------------------------------------------------------

--
-- Table structure for table `zone`
--

CREATE TABLE `zone` (
  `zone_id` int(10) NOT NULL,
  `country_code` char(2) NOT NULL,
  `zone_name` varchar(35) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social`
--
ALTER TABLE `social`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_activation`
--
ALTER TABLE `tbl_activation`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `tbl_application`
--
ALTER TABLE `tbl_application`
  ADD PRIMARY KEY (`t_id`);

--
-- Indexes for table `tbl_client`
--
ALTER TABLE `tbl_client`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_construction`
--
ALTER TABLE `tbl_construction`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `tbl_contact_us`
--
ALTER TABLE `tbl_contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_event`
--
ALTER TABLE `tbl_event`
  ADD PRIMARY KEY (`e_id`);

--
-- Indexes for table `tbl_forgotpwd`
--
ALTER TABLE `tbl_forgotpwd`
  ADD PRIMARY KEY (`forgotpwd_id`);

--
-- Indexes for table `tbl_leads`
--
ALTER TABLE `tbl_leads`
  ADD PRIMARY KEY (`l_id`);

--
-- Indexes for table `tbl_mailsetting`
--
ALTER TABLE `tbl_mailsetting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_power_rating`
--
ALTER TABLE `tbl_power_rating`
  ADD PRIMARY KEY (`pr_id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `tbl_product_documents`
--
ALTER TABLE `tbl_product_documents`
  ADD PRIMARY KEY (`pdf_id`);

--
-- Indexes for table `tbl_product_series`
--
ALTER TABLE `tbl_product_series`
  ADD PRIMARY KEY (`ps_id`);

--
-- Indexes for table `tbl_quotation`
--
ALTER TABLE `tbl_quotation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_slider`
--
ALTER TABLE `tbl_slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user_master`
--
ALTER TABLE `tbl_user_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_website_setting`
--
ALTER TABLE `tbl_website_setting`
  ADD PRIMARY KEY (`wid`);

--
-- Indexes for table `value_store`
--
ALTER TABLE `value_store`
  ADD PRIMARY KEY (`id`),
  ADD KEY `key` (`thekey`);

--
-- Indexes for table `zone`
--
ALTER TABLE `zone`
  ADD PRIMARY KEY (`zone_id`),
  ADD KEY `idx_country_code` (`country_code`),
  ADD KEY `idx_zone_name` (`zone_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `social`
--
ALTER TABLE `social`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_activation`
--
ALTER TABLE `tbl_activation`
  MODIFY `aid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_application`
--
ALTER TABLE `tbl_application`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `tbl_client`
--
ALTER TABLE `tbl_client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_construction`
--
ALTER TABLE `tbl_construction`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tbl_contact_us`
--
ALTER TABLE `tbl_contact_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_event`
--
ALTER TABLE `tbl_event`
  MODIFY `e_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_forgotpwd`
--
ALTER TABLE `tbl_forgotpwd`
  MODIFY `forgotpwd_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_leads`
--
ALTER TABLE `tbl_leads`
  MODIFY `l_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_mailsetting`
--
ALTER TABLE `tbl_mailsetting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_power_rating`
--
ALTER TABLE `tbl_power_rating`
  MODIFY `pr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=248;

--
-- AUTO_INCREMENT for table `tbl_product_documents`
--
ALTER TABLE `tbl_product_documents`
  MODIFY `pdf_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `tbl_product_series`
--
ALTER TABLE `tbl_product_series`
  MODIFY `ps_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `tbl_quotation`
--
ALTER TABLE `tbl_quotation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_slider`
--
ALTER TABLE `tbl_slider`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_user_master`
--
ALTER TABLE `tbl_user_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_website_setting`
--
ALTER TABLE `tbl_website_setting`
  MODIFY `wid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `value_store`
--
ALTER TABLE `value_store`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `zone`
--
ALTER TABLE `zone`
  MODIFY `zone_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=425;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
