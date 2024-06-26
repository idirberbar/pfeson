
CREATE DATABASE IF NOT EXISTS `gestion_bdd`;
USE `gestion_bdd`;

CREATE TABLE IF NOT EXISTS `incident` (
  `NumeroIncident` int(11) NOT NULL AUTO_INCREMENT,
  `LoginUtilisateur` varchar(30) NOT NULL,
  `DateIncident` date NOT NULL,
  `Resume` varchar(200) NOT NULL,
  `Statut` varchar(3) NOT NULL,
  `NomMateriel` varchar(8) NOT NULL,
  PRIMARY KEY (`NumeroIncident`),
  KEY `LoginUtilisateur` (`LoginUtilisateur`),
  KEY `NomMateriel` (`NomMateriel`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

INSERT INTO `incident` (`NumeroIncident`, `LoginUtilisateur`, `DateIncident`, `Resume`, `Statut`, `NomMateriel`) VALUES
(1, 'aadert', '2020-03-14', 'Office ne se lance pas', 'AT', 'LT103'),
(2, 'bzambet', '2020-03-16', 'L''odinateur ne redemarre plus', 'AT', 'LT114'),
(3, 'aadert', '2020-03-11', 'Problemes d''impression', 'AT', 'ENCELADE'),
(4, 'aadert', '2020-03-01', 'Ecran casse', 'R', 'iPad #10'),
(5, 'aadert', '2020-05-19', 'Je n''arrive pas a me connecter', 'R', 'LT116'),
(6, 'aleger', '2020-03-12', 'Probleme de connexion', 'R', 'iPad #10'),
(7, 'coreda', '2020-03-29', 'Probleme de connexion', 'R', 'iPad #3'),
(18, 'aadert', '2020-03-30', 'J''en ai marre. Rien ne marche.', 'AT', 'iPad #8');


CREATE TABLE IF NOT EXISTS `materiel` (
  `Nom` varchar(8) NOT NULL DEFAULT '',
  `Fabricant` varchar(15) DEFAULT NULL,
  `Modele` varchar(25) DEFAULT NULL,
  `Lieu` varchar(17) DEFAULT NULL,
  `IP` varchar(42) DEFAULT NULL,
  `Type` varchar(18) DEFAULT NULL,
  PRIMARY KEY (`Nom`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


INSERT INTO `materiel` (`Nom`, `Fabricant`, `Modele`, `Lieu`, `IP`, `Type`) VALUES
('donut', 'VMware, Inc.', 'VMware Virtual Platform', 'Agrio > Bureau11', '192.168.0.5\n127.0.0.1', 'Machine virtuelle'),
('EeePad', 'ASUS', 'Transformer TF101', 'Agrio > Bureau04', '', 'Tablette'),
('ENCELADE', 'VMware, Inc.', 'VMware Virtual Platform', 'Agrio', '192.168.0.7', 'Machine virtuelle'),
('iPad #1', 'Apple Inc', 'iPad', 'Agrio > Bureau06', '', 'Tablette'),
('iPad #10', 'Apple Inc', 'iPad2', 'Agrio > Bureau06', '', 'Tablette'),
('iPad #11', 'Apple Inc', 'iPad2', 'Agrio > Bureau06', '', 'Tablette'),
('iPad #12', 'Apple Inc', 'iPad2', 'Agrio > Bureau06', '', 'Tablette'),
('iPad #13', 'Apple Inc', 'iPad2', 'Agrio > Bureau06', '', 'Tablette'),
('iPad #2', 'Apple Inc', 'iPad', 'Agrio > Bureau06', '', 'Tablette'),
('iPad #3', 'Apple Inc', 'iPad', 'Agrio > Bureau06', '', 'Tablette'),
('iPad #4', 'Apple Inc', 'iPad', 'Agrio > \n\nBureau0', '', 'Tablette'),
('iPad #5', 'Apple Inc', 'iPad2', 'Agrio > Bureau06', '', 'Tablette'),
('iPad #6', 'Apple Inc', 'iPad2', 'Agrio > Bureau06', '', 'Tablette'),
('iPad #7', 'Apple Inc', 'iPad2', 'Agrio > Bureau06', '', 'Tablette'),
('iPad #8', 'Apple Inc', 'iPad2', 'Agrio > Bureau06', '', 'Tablette'),
('iPad #9', 'Apple Inc', 'iPad', 'Agrio > Bureau06', '', 'Tablette'),
('LT103', 'Dell \n\nInc.', 'Latitude D520', 'Agrio > Bureau04', '192.168.10.205\n0.0.0.0', 'Portable'),
('LT104', 'Dell Inc.', 'Latitude D520', 'Agrio \n\n> Bureau0', '192.168.10.207\n0.0.0.0', 'Portable'),
('LT105', 'Dell Inc.', 'Latitude D520', 'Agrio > Bureau04', '0.0.0.0\n192.168.10.1', 'Portable'),
('LT106', 'Dell Inc.', 'Latitude D520', 'Agrio > Bureau04', '192.168.10.211\n0.0.0.0', 'Portable'),
('LT108', 'Dell Inc.', 'Latitude D520', 'Agrio > Bureau04', '0.0.0.0\n192.168.10.216', 'Portable'),
('LT109', 'Dell \n\nInc.', 'Latitude D520', 'Agrio > Bureau04', '192.168.10.217\n0.0.0.0', 'Portable'),
('LT111', 'Dell Inc.', 'Latitude D520', 'Agrio \n\n> Bureau0', '0.0.0.0\n192.168.10.221', 'Portable'),
('LT112', 'Dell Inc.', 'Latitude D520', 'Agrio > Bureau04', '0.0.0.0\n192.168.10.224', 'Portable'),
('LT113', 'Dell Inc.', 'Latitude D520', 'Agrio > Bureau04', '192.168.10.225\n0.0.0.0', 'Portable'),
('LT114', 'Dell Inc.', 'Latitude D520', 'Agrio > Bureau04', '192.168.10.227\n0.0.0.0', 'Portable'),
('LT116', 'Dell \n\nInc.', 'Latitude D520', 'Agrio > Bureau04', '0.0.0.0\n192.168.0.134', 'Portable'),
('LT200', 'Dell Inc.', 'Latitude E6410', 'Agrio', '0.0.0.0\n192.168.0.155', 'Laptop'),
('LT201', 'LENOVO', '2847DNG', 'Agrio', '192.168.0.113\n0.0.0.0', 'Notebook'),
('MIMAS', 'VMware, Inc.', 'VMware Virtual Platform', 'Agrio > Bureau11', '192.168.0.6', 'Machine virtuelle'),
('NAS', 'HP', 'ProLiant DL380 G3', 'Agrio > Bureau11', '192.168.0.2', 'Rack Mount Chassis'),
('nb00', 'Dell Inc.', 'Latitude D430', 'Agrio > \n\nBureau0', '10.64.1.255\n127.0.0.1\n192.168.64.133', 'Laptop'),
('NB01', 'Toshiba', 'AC100-114', 'Agrio > Bureau04', '', 'Laptop'),
('Nom', 'Fabricant', 'Modele', 'Lieu', 'IP', 'Type'),
('puck', 'VMware, Inc.', 'VMware Virtual Platform', 'Agrio > \n\nBureau1', '192.168.0.9\n127.0.0.1', 'Machine virtuelle'),
('SETH', 'Fujitsu Siemens', 'ESPRIMO E5720', 'Agrio > Bureau06', '192.168.0.50\n192.168.64.131\n192.168.253.23', 'Desktop'),
('SOKARIS', 'Dell Inc.', 'OptiPlex GX620', 'Agrio', '192.168.0.70', 'Lunch Box'),
('TP101', 'Dell Inc.', 'OptiPlex 380', 'Agrio > Bureau12', '192.168.10.1', 'Mini Tower'),
('TP102', 'Dell Inc.', 'OptiPlex 380', 'Agrio > Bureau12', '192.168.10.2', 'Mini Tower'),
('TP103', 'Dell Inc.', 'OptiPlex 380', 'Agrio > Bureau12', '192.168.10.3', 'Mini Tower'),
('TP104', 'Dell Inc.', 'OptiPlex 380', 'Agrio > Bureau12', '192.168.10.4', 'Mini Tower'),
('TP105', 'Dell Inc.', 'OptiPlex 380', 'Agrio > Bureau12', '192.168.10.5', 'Mini Tower'),
('TP106', 'Dell Inc.', 'OptiPlex 380', 'Agrio > \n\nBureau1', '192.168.10.6', 'Mini Tower'),
('TP107', 'Dell Inc.', 'OptiPlex 380', 'Agrio > Bureau12', '192.168.10.7', 'Mini \n\nTower'),
('TP108', 'Dell Inc.', 'OptiPlex 380', 'Agrio > Bureau12', '192.168.10.8', 'Mini Tower'),
('TP109', 'Dell Inc.', 'OptiPlex \n\n380', 'Agrio > Bureau12', '192.168.10.9', 'Mini Tower'),
('TP110', 'Dell Inc.', 'OptiPlex 380', 'Agrio > Bureau12', '192.168.10.10', 'Mini Tower'),
('TP111', 'Dell Inc.', 'OptiPlex 380', 'Agrio > Bureau12', '192.168.10.11', 'Mini Tower'),
('TP112', 'Dell Inc.', 'OptiPlex 380', 'Agrio > Bureau12', '192.168.10.12', 'Mini Tower'),
('TP113', 'Dell Inc.', 'OptiPlex 380', 'Agrio > \n\nBureau1', '192.168.10.13', 'Mini Tower'),
('TP114', 'Dell Inc.', 'OptiPlex 380', 'Agrio > Bureau12', '192.168.10.14', 'Mini \n\nTower'),
('TP115', 'Dell Inc.', 'OptiPlex 380', 'Agrio > Bureau12', '192.168.10.15', 'Mini Tower'),
('TP116', 'Dell Inc.', 'OptiPlex \n\n380', 'Agrio > Bureau12', '192.168.10.16', 'Mini Tower'),
('TP117', 'Dell Inc.', 'OptiPlex 380', 'Agrio > Bureau12', '192.168.10.17', 'Mini Tower'),
('TP118', 'Dell Inc.', 'OptiPlex 380', 'Agrio > Bureau12', '192.168.10.18', 'Mini Tower'),
('TP119', 'Dell Inc.', 'OptiPlex 380', 'Agrio > Bureau12', '192.168.10.19', 'Mini Tower'),
('TP120', 'Dell Inc.', 'OptiPlex 380', 'Agrio > \n\nBureau1', '192.168.10.20', 'Mini Tower'),
('TP121', 'Dell Inc.', 'OptiPlex 380', 'Agrio > Bureau12', '192.168.10.21', 'Mini \n\nTower'),
('TP122', 'Dell Inc.', 'OptiPlex 380', 'Agrio > Bureau12', '192.168.10.22', 'Mini Tower'),
('TP123', 'Dell Inc.', 'OptiPlex \n\n380', 'Agrio > Bureau12', '192.168.10.23', 'Mini Tower'),
('TP124', 'Dell Inc.', 'OptiPlex 380', 'Agrio > Bureau12', '192.168.10.24', 'Mini Tower'),
('TP125', 'Dell Inc.', 'OptiPlex 380', 'Agrio > Bureau12', '192.168.10.25', 'Mini Tower'),
('TP126', 'Dell Inc.', 'OptiPlex 380', 'Agrio > Bureau12', '192.168.10.26', 'Mini Tower'),
('TP127', 'Dell Inc.', 'OptiPlex 380', 'Agrio > \n\nBureau1', '192.168.10.27', 'Mini Tower'),
('TP128', 'Dell Inc.', 'OptiPlex 380', 'Agrio > Bureau12', '192.168.10.28', 'Mini \n\nTower'),
('TP129', 'Dell Inc.', 'OptiPlex 380', 'Agrio > Bureau12', '192.168.10.29', 'Mini Tower'),
('TP130', 'Dell Inc.', 'OptiPlex \n\n380', 'Agrio > Bureau12', '192.168.10.30', 'Mini Tower'),
('TP131', 'Dell Inc.', 'OptiPlex 380', 'Agrio > Bureau15', '192.168.10.31', 'Mini Tower'),
('TP132', 'Dell Inc.', 'OptiPlex 380', 'Agrio > Bureau15', '192.168.10.32', 'Mini Tower'),
('TP133', 'Dell Inc.', 'OptiPlex 380', 'Agrio > Bureau15', '192.168.10.33', 'Mini Tower'),
('TP134', 'Dell Inc.', 'OptiPlex 380', 'Agrio > \n\nBureau1', '192.168.10.34', 'Mini Tower'),
('TP135', 'Dell Inc.', 'OptiPlex 380', 'Agrio > Bureau15', '192.168.10.35', 'Mini \n\nTower'),
('TP136', 'Dell Inc.', 'OptiPlex 380', 'Agrio > Bureau15', '192.168.10.36', 'Mini Tower'),
('TP137', 'Dell Inc.', 'OptiPlex \n\n380', 'Agrio > Bureau15', '192.168.10.37', 'Mini Tower'),
('TP138', 'Dell Inc.', 'OptiPlex 380', 'Agrio > Bureau15', '192.168.10.38', 'Mini Tower'),
('TP139', 'Dell Inc.', 'OptiPlex 380', 'Agrio > Bureau15', '192.168.10.39', 'Mini Tower'),
('TP140', 'Dell Inc.', 'OptiPlex 380', 'Agrio > Bureau15', '192.168.10.40', 'Mini Tower'),
('TP141', 'Dell Inc.', 'OptiPlex 380', 'Agrio > \n\nBureau1', '192.168.10.41', 'Mini Tower'),
('TP142', 'Dell Inc.', 'OptiPlex 380', 'Agrio > Bureau15', '192.168.10.42', 'Mini \n\nTower'),
('TP143', 'Dell Inc.', 'OptiPlex 380', 'Agrio > Bureau15', '192.168.10.43', 'Mini Tower'),
('TP144', 'Dell Inc.', 'OptiPlex \n\n380', 'Agrio > Bureau15', '192.168.10.44', 'Mini Tower'),
('TP145', 'Dell Inc.', 'OptiPlex 380', 'Agrio > Bureau15', '192.168.10.45', 'Mini Tower'),
('TP51', 'Fujitsu Siemens', 'ESPRIMO E5720', 'Agrio > Bureau17', '192.168.10.51', 'Desktop'),
('TP52', 'Fujitsu Siemens', 'ESPRIMO E5720', 'Agrio > Bureau17', '192.168.10.52', 'Desktop'),
('TP53', 'Fujitsu Siemens', 'ESPRIMO \n\nE5720', 'Agrio > Bureau17', '192.168.10.53', 'Desktop'),
('TP54', 'Fujitsu Siemens', 'ESPRIMO E5720', 'Agrio > Bureau17', '192.168.10.54', 'Desktop'),
('TP55', 'Fujitsu Siemens', 'ESPRIMO E5720', 'Agrio > Bureau17', '192.168.10.55', 'Desktop'),
('TP56', 'Fujitsu Siemens', 'ESPRIMO E5720', 'Agrio > Bureau17', '192.168.10.56', 'Desktop'),
('TP58', 'Fujitsu Siemens', 'ESPRIMO E5720', 'Agrio > Bureau17', '192.168.10.58', 'Desktop'),
('TP59', 'Fujitsu Siemens', 'ESPRIMO E5720', 'Agrio > Bureau17', '192.168.10.59', 'Desktop'),
('TP60', 'Fujitsu Siemens', 'ESPRIMO E5720', 'Agrio > Bureau17', '192.168.10.60', 'Desktop'),
('TP61', 'Fujitsu \n\nSieme', 'ESPRIMO E5720', 'Agrio > Bureau17', '192.168.10.61', 'Desktop'),
('TP62', 'Fujitsu Siemens', 'ESPRIMO E5720', 'Agrio > \n\nBureau1', '192.168.10.62', 'Desktop'),
('TP63', 'Fujitsu Siemens', 'ESPRIMO E5720', 'Agrio > Bureau17', '192.168.10.63', 'Desktop'),
('TP64', 'Fujitsu Siemens', 'ESPRIMO E5720', 'Agrio > Bureau17', '192.168.10.64', 'Mini Tower'),
('TP65', 'Fujitsu \n\nSieme', 'ESPRIMO E5720', 'Agrio > Bureau17', '192.168.10.65', 'Desktop'),
('TP66', 'Fujitsu Siemens', 'ESPRIMO E5720', 'Agrio > \n\nBureau1', '192.168.10.66', 'Desktop'),
('TP67', 'Fujitsu Siemens', 'ESPRIMO E5720', 'Agrio > Bureau17', '192.168.10.67', 'Desktop'),
('TP68', 'Fujitsu Siemens', 'ESPRIMO E5720', 'Agrio > Bureau17', '192.168.10.68', 'Desktop'),
('TP69', 'Fujitsu \n\nSieme', 'ESPRIMO E5720', 'Agrio > Bureau17', '192.168.10.69', 'Desktop'),
('TP70', 'Fujitsu Siemens', 'ESPRIMO E5720', 'Agrio > \n\nBureau1', '192.168.10.70', 'Desktop'),
('TP71', 'Fujitsu Siemens', 'ESPRIMO E5720', 'Agrio > Bureau17', '192.168.10.71', 'Desktop'),
('TP72', 'Fujitsu Siemens', 'ESPRIMO E5720', 'Agrio > Bureau17', '192.168.10.72', 'Desktop'),
('TP73', 'Fujitsu \n\nSieme', 'ESPRIMO E5720', 'Agrio > Bureau17', '192.168.10.73', 'Desktop'),
('TP74', 'Fujitsu Siemens', 'ESPRIMO E5720', 'Agrio > \n\nBureau1', '192.168.10.74', 'Desktop'),
('TP75', 'Fujitsu Siemens', 'ESPRIMO E5720', 'Agrio > Bureau17', '192.168.10.75', 'Desktop'),
('TP76', 'Fujitsu Siemens', 'ESPRIMO E5720', 'Agrio > Bureau17', '192.168.10.76', 'Desktop'),
('TP77', 'Fujitsu \n\nSieme', 'ESPRIMO E5720', 'Agrio > Bureau17', '192.168.10.77', 'Desktop'),
('TP78', 'Fujitsu Siemens', 'ESPRIMO E5720', 'Agrio > \n\nBureau1', '192.168.10.78', 'Desktop'),
('TP79', 'Fujitsu Siemens', 'ESPRIMO E5720', 'Agrio > Bureau17', '192.168.10.79', 'Desktop'),
('TP80', 'Fujitsu Siemens', 'ESPRIMO E5720', 'Agrio > Bureau17', '192.168.10.80', 'Desktop'),
('triton', 'Apple Inc', 'MacBookPro8,1', 'Agrio > 1er Ǹtage', '192.168.0.63', 'Portable'),
('uranus', 'Apple Inc', 'iMac9,1', 'Agrio > Bureau10', '192.168.0.179\n10.0.58.89', 'Desktop'),
('VARUNA', 'Dell Inc.', 'OptiPlex 380', 'Agrio', '192.168.0.61\n192.168.64.185', 'Space-\n\nSaving'),
('VESTA', 'Dell Inc.', 'OptiPlex 380', 'Agrio', '192.168.0.60', 'Space-Saving'),
('WS15', 'Dell Inc.', 'Precision \n\nWorkStation 3', 'Agrio', '192.168.10.46', 'Tower'),
('yad', 'Apple Inc', 'MacBook7,1', 'Agrio > Bureau06', '192.168.10.12', 'Portable'),
('yed', 'Apple Inc', 'MacBook7,1', 'Agrio > Bureau06', '192.168.0.57', 'Portable');


CREATE TABLE IF NOT EXISTS `utilisateur` (
  `Identifiant` varchar(30) NOT NULL,
  `Nom` varchar(30) NOT NULL,
  `MotDePasse` varchar(10) NOT NULL,
  `Messagerie` varchar(30) NOT NULL,
  `Lieu` varchar(30) NOT NULL,
  `Actif` varchar(30) NOT NULL,
  `Profil` varchar(30) NOT NULL,
  PRIMARY KEY (`Identifiant`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


INSERT INTO `utilisateur` (`Identifiant`, `Nom`, `MotDePasse`, `Messagerie`, `Lieu`, `Actif`, `Profil`) VALUES
('aadert', 'Adert', 'mdp', 'Antonin.Adert@agrio.fr', '', 'Oui', 'utilisateur'),
('aantoine', 'Antoine', 'mdp', 'Accart.Antoine@agrio.fr', '', 'Oui', 'administrateur'),
('abona', 'Bona', 'yaya', 'Alice.Bona@agrio.fr', '', 'Oui', 'utilisateur'),
('abruneau', 'Bruno', 'formule', 'Marc.Bruno@agrio.fr', '', 'Oui', 'utilisateur'),
('adutertre', 'Duterra', 'argter23', 'Alain.Duterra@agrio.fr', '', 'Oui', 'utilisateur'),
('afernandez', 'Fernandez', '_123FRDUT', 'Aline.Fernandez@agrio.fr', '', 'Oui', 'administrateur'),
('aleger', 'Leger', 'sarcte', 'Alain.Leger@agrio.fr', '', 'Oui', 'utilisateur'),
('anielot', 'Nielot', 'ratata', 'Audrey.Nielot@agrio.fr', '', 'Oui', 'utilisateur'),
('aroche', 'Rocher', 'amelie16', 'Amelie.Rocher@agrio.fr', '', 'Oui', 'utilisateur'),
('bzambet', 'Zambet', 'qtrauer', 'Brice.Zambet@agrio.fr', '', 'Oui', 'utilisateur'),
('cbarriere', 'Barriere', 'gzejfatlei', 'Caroline.Barriere@agrio.fr', '', 'Oui', 'utilisateur'),
('cbert', 'Berat', 'gyaro', 'Claude.Berat@agrio.fr', '', 'Oui', 'utilisateur'),
('cbeya', 'Beya', 'gt&2UETZ', 'Christophe.Beya@agrio.fr', '', 'Oui', 'utilisateur'),
('coreda', 'Oreda', 'zartie', 'Claire.Oreda@agrio.fr', '', 'Oui', 'utilisateur');
