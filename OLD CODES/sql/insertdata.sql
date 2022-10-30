INSERT INTO accountdetails (username, password) VALUES ('testusername', '$password');
INSERT INTO accountdetails (username, password) VALUES ('testtest', '$password');
INSERT INTO custdetails (accountId, fullName, email, phoneNumber, DOB, address, zipcode) VALUES ( (SELECT accountId from accountdetails where username = 'testusername'), 'testName', 'test@gmail.com', '82064342', '1999-08-28', 'Blk 57 Hougang Ave', '123456');
---- insert BACKPACK product
INSERT INTO `productdetails` (productname, price, category, image, description) VALUES ('Adidas Black Logo Backpack', '89.00', 'backpack', LOAD_FILE('file:///C:/xampp/htdocs/IE4717_CatOutofTheBag/assets/backpack/adidasBP_blacklogo.jpg'), 'Width: 23cm\r\nHeight: 25cm\r\nBreadth: 5cm\r\nMaterial: Nylon');

INSERT INTO `productdetails` (productname, price, category, image, description) VALUES ('Adidas Green Logo Backpack', '89.00', 'backpack', LOAD_FILE('file:///C:/xampp/htdocs/IE4717_CatOutofTheBag/assets/backpack/adidasBP_greenlogo.jpg'), 'Width: 23cm\r\nHeight: 25cm\r\nBreadth: 5cm\r\nMaterial: Nylon');

INSERT INTO `productdetails` (productname, price, category, image, description) VALUES ('Billabong Blue Canvas Backpack', '35.00', 'backpack', LOAD_FILE('file:///C:/xampp/htdocs/IE4717_CatOutofTheBag/assets/backpack/billabongBP_bluecanvas.jpg'), 'Width: 20cm\r\nHeight: 22cm\r\nBreadth: 5cm\r\nMaterial: Canvas');

INSERT INTO `productdetails` (productname, price, category, image, description) VALUES ('Billabong Mini Green Backpack', '20.00', 'backpack', LOAD_FILE('file:///C:/xampp/htdocs/IE4717_CatOutofTheBag/assets/backpack/billabongBP_minigreenflower.jpg'), 'Width: 10cm\r\nHeight: 15cm\r\nBreadth: 5cm\r\nMaterial: Canvas');

INSERT INTO `productdetails` (productname, price, category, image, description) VALUES ('Cabin Zero Green Backpack', '50.00', 'backpack', LOAD_FILE('file:///C:/xampp/htdocs/IE4717_CatOutofTheBag/assets/backpack/cabinzeroBP_classicgreen.jpg'), 'Width: 23cm\r\nHeight: 25cm\r\nBreadth: 7cm\r\nMaterial: Denier Polyester');


---- insert HANDBAG product
INSERT INTO `productdetails` (productname, price, category, image, description) VALUES ('BTV Canvas Blue Handbag', '70.00', 'handbag', LOAD_FILE('file:///C:/xampp/htdocs/IE4717_CatOutofTheBag/assets/handbag/BTV_HBcanvasblue.jpg'), 'Width: 15cm\r\nHeight: 10cm\r\nBreadth: 3cm\r\nMaterial: Canvas');

INSERT INTO `productdetails` (productname, price, category, image, description) VALUES ('BTV Black Dumpling Handbag', '79.00', 'handbag', LOAD_FILE('file:///C:/xampp/htdocs/IE4717_CatOutofTheBag/assets/handbag/BTV_HBdumplingblack.jpg'), 'Width: 20cm\r\nHeight: 17cm\r\nBreadth: 9cm\r\nMaterial: Polyester & Cotton');

INSERT INTO `productdetails` (productname, price, category, image, description) VALUES ('BTV Khaki Dumpling Handbag', '79.00', 'handbag', LOAD_FILE('file:///C:/xampp/htdocs/IE4717_CatOutofTheBag/assets/handbag/BTV_HBdumplingkhaki.jpg'), 'Width: 20cm\r\nHeight: 17cm\r\nBreadth: 9cm\r\nMaterial: Polyester & Cotton');

INSERT INTO `productdetails` (productname, price, category, image, description) VALUES ('BTV Maroon Dumpling Handbag', '59.00', 'handbag', LOAD_FILE('file:///C:/xampp/htdocs/IE4717_CatOutofTheBag/assets/handbag/BTV_HBmicrodumplingmaroon.jpg'), 'Width: 10cm\r\nHeight: 7cm\r\nBreadth: 7cm\r\nMaterial: Polyester & Cotton');

INSERT INTO `productdetails` (productname, price, category, image, description) VALUES ('Charles & Keith Navy Handbag', '99.00', 'handbag', LOAD_FILE('file:///C:/xampp/htdocs/IE4717_CatOutofTheBag/assets/handbag/CNK_Wgabinenavy.jpg'), 'Width: 25cm\r\nHeight: 12cm\r\nBreadth: 5cm\r\nMaterial: Leather & Canvas');


---- insert WAISTBAG product
INSERT INTO `productdetails` (productname, price, category, image, description) VALUES ('Adidas Beige Waistbag', '30.00', 'wasitbag', LOAD_FILE('file:///C:/xampp/htdocs/IE4717_CatOutofTheBag/assets/waistbag/adidasWB_beige.jpg'), 'Width: 23cm\r\nHeight: 15cm\r\nBreadth: 7cm\r\nMaterial: Nylon');

INSERT INTO `productdetails` (productname, price, category, image, description) VALUES ('Billabong Black Waistbag', '30.00', 'wasitbag', LOAD_FILE('file:///C:/xampp/htdocs/IE4717_CatOutofTheBag/assets/waistbag/billabongWB_black.jpg'), 'Width: 23cm\r\nHeight: 15cm\r\nBreadth: 7cm\r\nMaterial: Nylon');

INSERT INTO `productdetails` (productname, price, category, image, description) VALUES ('Billabong Flower Waistbag', '40.00', 'waistbag', LOAD_FILE('file:///C:/xampp/htdocs/IE4717_CatOutofTheBag/assets/waistbag/billabongWB_flower.jpg'), 'Width: 20cm\r\nHeight: 15cm\r\nBreadth: 5cm\r\nMaterial: Polyester & Polyurethane');

INSERT INTO `productdetails` (productname, price, category, image, description) VALUES ('Billabong Grey Waistbag', '30.00', 'waistbag', LOAD_FILE('file:///C:/xampp/htdocs/IE4717_CatOutofTheBag/assets/waistbag/billabongWB_grey.jpg'), 'Width: 23cm\r\nHeight: 15cm\r\nBreadth: 7cm\r\nMaterial: Nylon');

INSERT INTO `productdetails` (productname, price, category, image, description) VALUES ('Herschel Yellow Waistbag', '45.00', 'waistbag', LOAD_FILE('file:///C:/xampp/htdocs/IE4717_CatOutofTheBag/assets/waistbag/herschelWB.jpg'), 'Width: 23cm\r\nHeight: 15cm\r\nBreadth: 7cm\r\nMaterial: Cotton');

---- insert TOTEBAG product
INSERT INTO `productdetails` (productname, price, category, image, description) VALUES ('Billabong HGL Totebag', '69.00', 'totebag', LOAD_FILE('file:///C:/xampp/htdocs/IE4717_CatOutofTheBag/assets/totebag/billabongTB_happygolucky.jpg'), 'Width: 25cm\r\nHeight: 30cm\r\nBreadth: 7cm\r\nMaterial: Canvas');

INSERT INTO `productdetails` (productname, price, category, image, description) VALUES ('Billabong Blue Canvas Totebag', '30.00', 'totebag', LOAD_FILE('file:///C:/xampp/htdocs/IE4717_CatOutofTheBag/assets/totebag/billabongTB_canvasblue.jpg'), 'Width: 30cm\r\nHeight: 23cm\r\nBreadth: 5cm\r\nMaterial: Canvas');

INSERT INTO `productdetails` (productname, price, category, image, description) VALUES ('BTV Brown Totebag', '89.00', 'totebag', LOAD_FILE('file:///C:/xampp/htdocs/IE4717_CatOutofTheBag/assets/totebag/BTV_TBbrown.jpg'), 'Width: 30cm\r\nHeight: 27cm\r\nBreadth: 10cm\r\nMaterial: Canvas');

INSERT INTO `productdetails` (productname, price, category, image, description) VALUES ('BTV Khaki Drawstring Totebag', '100.00', 'totebag', LOAD_FILE('file:///C:/xampp/htdocs/IE4717_CatOutofTheBag/assets/totebag/BTV_TBdrawstringkhaki.jpg'), 'Width: 10cm\r\nHeight: 15cm\r\nBreadth: 5cm\r\nMaterial: Canvas');

INSERT INTO `productdetails` (productname, price, category, image, description) VALUES ('BTV Olive Drawstring Totebag', '100.00', 'totebag', LOAD_FILE('file:///C:/xampp/htdocs/IE4717_CatOutofTheBag/assets/totebag/BTV_TBdrawstringolive.jpg'), 'Width: 10cm\r\nHeight: 15cm\r\nBreadth: 5cm\r\nMaterial: Canvas');

---- insert WALLET product
INSERT INTO `productdetails` (productname, price, category, image, description) VALUES ('Billabong BiFold Black Wallet', '40.00', 'wallet', LOAD_FILE('file:///C:/xampp/htdocs/IE4717_CatOutofTheBag/assets/wallet/billabongW_bifoldblack.jpg'), 'Width: 10cm\r\nHeight: 7cm\r\nBreadth: 3cm\r\nMaterial: Leather');

INSERT INTO `productdetails` (productname, price, category, image, description) VALUES ('Billabong Leather Wallet', '40.00', 'wallet', LOAD_FILE('file:///C:/xampp/htdocs/IE4717_CatOutofTheBag/assets/wallet/billabongW_leather.jpg'), 'Width: 10cm\r\nHeight: 7cm\r\nBreadth: 3cm\r\nMaterial: Leather');

INSERT INTO `productdetails` (productname, price, category, image, description) VALUES ('Charles & Keith Strawberry Wallet', '55.00', 'wallet', LOAD_FILE('file:///C:/xampp/htdocs/IE4717_CatOutofTheBag/assets/wallet/CNK_beadstrawberry.jpg'), 'Width: 10cm\r\nHeight: 7cm\r\nBreadth: 3cm\r\nMaterial: Polyester & Stainless Steel');

INSERT INTO `productdetails` (productname, price, category, image, description) VALUES ('Charles & Keith Cloud Wallet', '60.00', 'wallet', LOAD_FILE('file:///C:/xampp/htdocs/IE4717_CatOutofTheBag/assets/wallet/CNK_Whandlecloud.jpg'), 'Width: 10cm\r\nHeight: 7cm\r\nBreadth: 3cm\r\nMaterial: Polyester & Stainless Steel');

INSERT INTO `productdetails` (productname, price, category, image, description) VALUES ('Charles & Keith Holo Wallet', '60.00', 'wallet', LOAD_FILE('file:///C:/xampp/htdocs/IE4717_CatOutofTheBag/assets/wallet/CNK_Whandleholo.jpg'), 'Width: 10cm\r\nHeight: 7cm\r\nBreadth: 3cm\r\nMaterial: Polyester & Stainless Steel');

---- insert LUGGAGE product
INSERT INTO `productdetails` (productname, price, category, image, description) VALUES ('Away Grey Luggage', '110.00', 'luggage', LOAD_FILE('file:///C:/xampp/htdocs/IE4717_CatOutofTheBag/assets/luggage/awayL_greywheel.jpg'), 'Width: 29cm\r\nHeight: 76cm\r\nBreadth:30cm\r\nMaterial: Acrylonitrile Butadiene Styrene (ABS)');

INSERT INTO `productdetails` (productname, price, category, image, description) VALUES ('way Pink Luggage', '110.00', 'luggage', LOAD_FILE('file:///C:/xampp/htdocs/IE4717_CatOutofTheBag/assets/luggage/awayL_pinkwheel.jpg'), 'Width: 29cm\r\nHeight: 76cm\r\nBreadth:30cm\r\nMaterial: Acrylonitrile Butadiene Styrene (ABS)');

INSERT INTO `productdetails` (productname, price, category, image, description) VALUES ('Billabong Black Duffel Luggage', '79.00', 'luggage', LOAD_FILE('file:///C:/xampp/htdocs/IE4717_CatOutofTheBag/assets/luggage/billabongL_blackduffel.jpg'), 'Width: 48cm\r\nHeight: 18cm\r\nBreadth:20cm\r\nMaterial: Nylon');

INSERT INTO `productdetails` (productname, price, category, image, description) VALUES ('Billabong Black Luggage', '99.00', 'luggage', LOAD_FILE('file:///C:/xampp/htdocs/IE4717_CatOutofTheBag/assets/luggage/billabongL_blackwheel.jpg'), 'Width: 25cm\r\nHeight: 67cm\r\nBreadth: 25cm\r\nMaterial: Nylon');

INSERT INTO `productdetails` (productname, price, category, image, description) VALUES ('Jetstream White Luggage', '99.00', 'luggage', LOAD_FILE('file:///C:/xampp/htdocs/IE4717_CatOutofTheBag/assets/luggage/jetstreamL_whitewheel.jpg'), 'Width: 29cm\r\nHeight: 76cm\r\nBreadth:30cm\r\nMaterial: Acrylonitrile Butadiene Styrene (ABS)');


