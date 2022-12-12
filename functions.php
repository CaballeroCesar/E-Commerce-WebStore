<!-------------------------------------- 
CSCI 466: Web-based Store
Group 13: Aaron, Jessie, Cesar, Seth
File: functions.php

File Information: 
    Collection of functions used for
    the project.

--------------------------------------->
<?php
    function setPicture($productName)
    {
        if($productName == "Apple")
        {
            echo "<img src=\"https://www.seekpng.com/png/full/968-9681864_apple-png-background-stock-photo-apple-fruit.png\" alt=\"Apple\" width=\"100\" height=\"100\">";
        }
        elseif($productName == "Banana")
        {
            echo "<img src=\"https://www.seekpng.com/png/full/8-80815_free-png-banana-png-images-transparent-banana-png.png\" alt=\"Banana\" width=\"100\" height=\"100\">";
        }
        elseif($productName == "Orange")
        {
            echo "<img src=\"https://www.seekpng.com/png/full/77-778580_fresh-orange-orange-fruit-leaf.png\" alt=\"Orange\" width=\"100\" height=\"100\">";
        }
        elseif($productName == "Broccoli")
        {
            echo "<img src=\"https://www.seekpng.com/png/full/149-1490156_free-png-fresh-broccoli-png-images-transparent-broccoli.png\" alt=\"Broccoli\" width=\"100\" height=\"100\">";
        }
        elseif($productName == "Strawberries")
        {
            echo "<img src=\"https://www.seekpng.com/png/full/148-1487407_chef-s-recipe-strawberry-food-strawberry.png\" alt=\"Strawberries\" width=\"150\" height=\"100\">";
        }
        elseif($productName == "Blueberries")
        {
            echo "<img src=\"https://www.seekpng.com/png/full/17-171964_blueberry-transparent-png-lorann-blueberry-flavoring-1-dram.png\" alt=\"Blueberries\" width=\"150\" height=\"100\">";
        }
        elseif($productName == "Carrots")
        {
            echo "<img src=\"https://www.seekpng.com/png/full/6-61498_carrot-png-hd-carrot.png\" alt=\"Carrots\" width=\"150\" height=\"100\">";
        }
        elseif($productName == "Peas")
        {
            echo "<img src=\"https://www.seekpng.com/png/full/46-465868_pea-png-photo-green-peas.png\" alt=\"Peas\" width=\"150\" height=\"100\">";
        }
        elseif($productName == "Green Peppers")
        {
            echo "<img src=\"https://www.seekpng.com/png/full/185-1855084_19397-large-green-bell-peppers-png.png\" alt=\"Green Peppers\" width=\"150\" height=\"100\">";
        }
        elseif($productName == "Mango")
        {
            echo "<img src=\"https://www.seekpng.com/png/full/32-328366_mango-png-pic-fresh-produce-organic-mango.png\" alt=\"Mango\" width=\"150\" height=\"100\">";
        }
        elseif($productName == "Avocado")
        {
            echo "<img src=\"https://www.seekpng.com/png/full/14-140367_free-png-avocado-png-file-png-images-transparent.png\" alt=\"Avocado\" width=\"100\" height=\"100\">";
        }
        elseif($productName == "Pineapple")
        {
            echo "<img src=\"https://www.seekpng.com/png/full/7-73730_download-pineapple-png-image-pineapple-png.png\" alt=\"Pineapple\" width=\"100\" height=\"100\">";
        }
        elseif($productName == "Peach")
        {
            echo "<img src=\"https://www.seekpng.com/png/full/19-193807_peach-png-clipart-picture-peach-clipart.png\" alt=\"Peach\" width=\"100\" height=\"100\">";
        }
        elseif($productName == "Raspberries")
        {
            echo "<img src=\"https://www.seekpng.com/png/full/71-710633_free-png-raspberry-png-images-transparent-raspberry-png.png\" alt=\"Raspberries\" width=\"150\" height=\"100\">";
        }
        elseif($productName == "Corn")
        {
            echo "<img src=\"https://www.seekpng.com/png/full/16-167292_sweet-corn-png-file-corn-png.png\" alt=\"Corn\" width=\"100\" height=\"100\">";
        }
        elseif($productName == "Onions")
        {
            echo "<img src=\"https://www.seekpng.com/png/full/7-73820_white-onion-png-file-white-onion-png.png\" alt=\"Onions\" width=\"150\" height=\"100\">";
        }
        elseif($productName == "Grapes")
        {
            echo "<img src=\"https://www.seekpng.com/png/full/10-107883_grapes-transparent-red-wine-red-wine-grapes-transparent.png\" alt=\"Grapes\" width=\"150\" height=\"100\">";
        }
        elseif($productName == "Watermelon")
        {
            echo "<img src=\"https://www.seekpng.com/png/full/235-2352451_best-waterlemon-halved-png-water-melon.png\" alt=\"Watermelon\" width=\"150\" height=\"100\">";
        }
        elseif($productName == "Starfruit")
        {
            echo "<img src=\"https://www.pngmart.com/files/10/Starfruit-Juice-PNG-Photos-420x195.png\" alt=\"Starfruit\" width=\"150\" height=\"100\">";
        }
        elseif($productName == "Cucumber")
        {
            echo "<img src=\"https://www.seekpng.com/png/full/67-674394_cucumber-png-file-cucumbers-png.png\" alt=\"Cucumber\" width=\"150\" height=\"100\">";
        }  
    }

    function setDescription($productName)
    {
        if($productName == "Apple")
        {
            echo "An apple is an edible fruit produced by an apple tree ( Malus domestica ). Apple trees are cultivated worldwide and are the most widely grown species in the genus Malus. The tree originated in Central Asia, where its wild ancestor, Malus sieversii, is still found today.";
        }
        elseif($productName == "Banana")
        {
            echo "A banana is an elongated, edible fruit – botanically a berry – produced by several kinds of large herbaceous flowering plants in the genus Musa. In some countries, bananas used for cooking may be called \"plantains\", distinguishing them from dessert bananas.";
        }
        elseif($productName == "Orange")
        {
            echo "An orange is a fruit of various citrus species in the family Rutaceae ; it primarily refers to Citrus × sinensis, which is also called sweet orange, to distinguish it from the related Citrus × aurantium, referred to as bitter orange.";
        }
        elseif($productName == "Broccoli")
        {
            echo "Broccoli (Brassica oleracea var. italica) is an edible green plant in the cabbage family (family Brassicaceae, genus Brassica) whose large flowering head, stalk and small associated leaves are eaten as a vegetable. Broccoli is classified in the Italica cultivar group of the species Brassica oleracea.";
        }
        elseif($productName == "Strawberries")
        {
            echo "Strawberry The garden strawberry (or simply strawberry; Fragaria × ananassa) is a widely grown hybrid species of the genus Fragaria, collectively known as the strawberries, which are cultivated worldwide for their fruit. The fruit is widely appreciated for its characteristic aroma, bright red color, juicy texture, and sweetness.";
        }
        elseif($productName == "Blueberries")
        {
            echo "Blueberries are a widely distributed and widespread group of perennial flowering plants with blue or purple berries. They are classified in the section Cyanococcus within the genus Vaccinium. Vaccinium also includes cranberries, bilberries, huckleberries and Madeira blueberries. Commercial blueberries—both wild (lowbush) and cultivated (highbush)—are all native to North America. The highbush varieties were introduced into Europe during the 1930s.";
        }
        elseif($productName == "Carrots")
        {
            echo "The carrot (Daucus carota subsp. sativus) is a root vegetable, typically orange in color, though purple, black, red, white, and yellow cultivars exist, all of which are domesticated forms of the wild carrot, Daucus carota, native to Europe and Southwestern Asia. The plant probably originated in Persia and was originally cultivated for its leaves and seeds. The most commonly eaten part of the plant is the taproot, although the stems and leaves are also eaten. The domestic carrot has been selectively bred for its enlarged, more palatable, less woody-textured taproot.";
        }
        elseif($productName == "Peas")
        {
            echo "The pea is most commonly the small spherical seed or the seed-pod of the flowering plant species Pisum sativum. Each pod contains several peas, which can be green or yellow. Botanically, pea pods are fruit, since they contain seeds and develop from the ovary of a (pea) flower";
        }
        elseif($productName == "Green Peppers")
        {
            echo "Green pepper (Capsicum annuum) belongs to the Solanaceae family. It comes from the same plant as the yellow and red pepper. These different colours are determined by the stage of ripening. Pepper is green when not yet ripe. As it ripens, it turns yellow, then orange, then red";
        }
        elseif($productName == "Mango")
        {
            echo "A mango is a stone fruit produced from numerous species of tropical trees belonging to the flowering plant genus Mangifera, cultivated mostly for their edible fruit. Most of these species are found in nature as wild mangoes. The genus belongs to the cashew family Anacardiaceae.";
        }
        elseif($productName == "Avocado")
        {
            echo "The avocado (Persea americana) is a medium-sized, evergreen tree in the laurel family (Lauraceae). It is native to the Americas and was first domesticated by Mesoamerican tribes more than 5,000 years ago. Then as now it was prized for its large and unusually oily fruit.";
        }
        elseif($productName == "Pineapple")
        {
            echo "The pineapple is a herbaceous perennial, which grows to 1.0 to 1.5 m (3 ft 3 in to 4 ft 11 in) tall, although sometimes it can be taller. The plant has a short, stocky stem with tough, waxy leaves. When creating its fruit, it usually produces up to 200 flowers, although some large-fruited cultivars can exceed this.";
        }
        elseif($productName == "Peach")
        {
            echo "The peach is a deciduous tree first domesticated and cultivated in Zhejiang province of Eastern China. It bears edible juicy fruits with various characteristics, most called peaches and others, nectarines.";
        }
        elseif($productName == "Raspberries")
        {
            echo "The raspberry is the edible fruit of a multitude of plant species in the genus Rubus of the rose family, most of which are in the subgenus Idaeobatus. The name also applies to these plants themselves. Raspberries are perennial with woody stems";
        }
        elseif($productName == "Corn")
        {
            echo "Maize, also known as corn, is a cereal grain first domesticated by indigenous peoples in southern Mexico about 10,000 years ago. The leafy stalk of the plant produces pollen inflorescences and separate ovuliferous inflorescences called ears that when fertilized yield kernels or seeds, which are fruits.";
        }
        elseif($productName == "Onions")
        {
            echo "An onion, also known as the bulb onion or common onion, is a vegetable that is the most widely cultivated species of the genus Allium. The shallot is a botanical variety of the onion which was classified as a separate species until 2010.";
        }
        elseif($productName == "Grapes")
        {
            echo "A grape is a fruit, botanically a berry, of the deciduous woody vines of the flowering plant genus Vitis. Grapes are a non-climacteric type of fruit, generally occurring in clusters.";
        }
        elseif($productName == "Watermelon")
        {
            echo "Watermelon is a flowering plant species of the Cucurbitaceae family and the name of its edible fruit. A scrambling and trailing vine-like plant, it is a highly cultivated fruit worldwide, with more than 1,000 varieties.";
        }
        elseif($productName == "Starfruit")
        {
            echo "Carambola, also known as star fruit, is the fruit of Averrhoa carambola, a species of tree native to tropical Southeast Asia. The mildly poisonous fruit is commonly consumed in parts of Brazil, Southeast Asia, South Asia, the South Pacific, Micronesia, parts of East Asia, the United States, and the Caribbean and contains the neurotoxin caramboxin. The tree is cultivated throughout tropical areas of the world.";
        }
        elseif($productName == "Cucumber")
        {
            echo "Cucumber (Cucumis sativus) is a widely-cultivated creeping vine plant in the Cucurbitaceae family that bears usually cylindrical fruits, which are used as culinary vegetables. Considered an annual plant, there are three main varieties of cucumber—slicing, pickling, and seedless—within which several cultivars have been created.";
        }  
    }
?>
