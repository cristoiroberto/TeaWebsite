<?php 
session_start(); 

$title = "Home";
$content = '<img src="Images/greentea.jpg" class="imgLeft"/>
<h3> Green Tea</h1>
<p>
    GREEN Tea is more than just green liquid.Many of the bioactive compounds in the tea leaves do make it into the final drink,
    which contains large amounts of important nutrients.It is loaded with polyphenols like flavonoids and catechins,
    which function as powerful antioxidants.These substances can reduce the formation of free radicals in the body,
    protecting cells and molecules from damage.One of the more powerful compounds in green tea is the antioxidant 
    Epigallocatechin Gallate (EGCG), which has been studied to treat various diseases and may be one of the main reasons green
    tea has such powerful medicinal properties.Green tea also has small amounts of minerals that are important for health.

</p>

<img src="Images/whitetea.jpg" class="imgRight"/>
<h3> White Tea</h3>
<p>
    Health benefits of WHITE Tea include reduced risk of cancer, cardiovascular disorder, and improvement in oral health. 
    It has antioxidant and anti-aging properties which help in maintaining good health and wrinkle free skin. 
    It protects skin from the harmful effects of UV light. With its antibacterial properties, white tea protects the body 
    from various infection causing bacteria.It provides relief to diabetic people from symptoms such as decreased plasma
    glucose levels, increased insulin secretion and excessive thirst (polydipsia).  Intake of white tea also helps in losing weight.
</p>

<img src="Images/blacktea.jpg" class="imgLeft"/>
<h3> Black Tea</h3>
<p>
    Black tea is a type of tea that is more oxidized than oolong, green and white teas. Black tea is generally stronger in flavor
    than the less oxidized teas. All four types are made from leaves of the shrub (or small tree) Camellia sinensis.
    Two principal varieties of the species are used – the small-leaved Chinese variety plant (C. sinensis subsp. sinensis),
    used for most other types of teas, and the large-leaved Assamese plant (C. sinensis subsp. assamica), which was traditionally
    mainly used for black tea, although in recent years some green and white have been produced.
</p>';
        
include 'Template.php';
?>

