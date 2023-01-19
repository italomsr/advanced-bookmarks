function advanced_bookmarks_submenu($wp_admin_bar) {
    $args = array(
        'id'    => 'advanced_bookmarks',
        'title' => '🛠️ Advanced Bookmarks',
        'href'  => '#',
        'meta'  => array(
            'class' => 'advanced_bookmarks menupop'
        )
    );
    $wp_admin_bar->add_node($args);

    $args = array(
        'id'    => 'word_count_bookmark',
        'title' => 'Word Count',
        'href'  => '#',
        'parent' => 'advanced_bookmarks',
        'meta'  => array(
            'class' => 'word_count_bookmark',
            'onclick' => 'adWords()'
        )
    );
    $wp_admin_bar->add_node($args);
    
    $args = array(
        'id'    => 'keyword_density_bookmark',
        'title' => 'Keyword Density',
        'href'  => '#',
        'parent' => 'advanced_bookmarks',
        'meta'  => array(
            'class' => 'keyword_density_bookmark',
            'onclick' => 'adKeyword()',
            'target' => '_self'
        )
    );
    $wp_admin_bar->add_node($args);

    $args = array(
        'id'    => 'find_bookmark',
        'title' => 'Find Duplicate',
        'href'  => '#',
        'parent' => 'advanced_bookmarks',
        'meta'  => array(
            'class' => 'keyword_density_bookmark',
            'onclick' => 'adDuplicate()',
            'target' => '_self'
        )
    );
    $wp_admin_bar->add_node($args);

    $args = array(
        'id'    => 'nofollow_bookmark',
        'title' => 'Links Nofollow',
        'href'  => '#',
        'parent' => 'advanced_bookmarks',
        'meta'  => array(
            'class' => 'nofollow_bookmark',
            'onclick' => 'adNofollow()',
            'target' => '_self'
        )
    );
    $wp_admin_bar->add_node($args);

    $args = array(
        'id'    => 'yellow_bookmark',
        'title' => 'Nofollow (yellow)',
        'href'  => '#',
        'parent' => 'advanced_bookmarks',
        'meta'  => array(
            'class' => ' yellow_bookmark',
            'onclick' => 'adNfyellow()',
            'target' => '_self'
        )
    );
    $wp_admin_bar->add_node($args);

    $args = array(
        'id'    => 'broken_bookmark',
        'title' => 'Broken links (Red)',
        'href'  => '#',
        'parent' => 'advanced_bookmarks',
        'meta'  => array(
            'class' => 'broken_bookmark',
            'onclick' => 'AdBroken()',
            'target' => '_self'
        )
    );
    $wp_admin_bar->add_node($args);

}
add_action('admin_bar_menu', 'advanced_bookmarks_submenu', 100);
?>

<script>
  function adWords(){
  var text = document.body.innerText;
  var wordCount = text.split(" ").length;
  alert("🛠️ This webpage has " + wordCount + " words.");
}

function adKeyword(){
var keyword = prompt("🛠️ Enter the keyword you want to check:");
if (keyword) {
    var text = document.body.innerText;
    var wordCount = text.split(" ").length;
    var keywordCount = (text.match(new RegExp(keyword, "gi")) || []).length;
    var density = (keywordCount / wordCount * 100).toFixed(2) + "%";
    alert("The keyword density for '" + keyword + "' on this webpage is " + density);
    } else {
    alert("Please enter a keyword to check");
}
}

function adDuplicate(){
var selectedText = window.getSelection().toString();
if (selectedText) {
var googleSearch = "https://www.google.com/search?q=intext:" + selectedText;
window.open(googleSearch);
} else {
alert("Please select some text before running this function.");
}
}

function adNofollow(){
var links = document.getElementsByTagName("a");
var totalLinks = links.length;
var nofollowLinks = 0;
for (var i = 0; i < links.length; i++) {
if (links[i].rel == "nofollow") {
nofollowLinks++;
}
}
alert("🛠️ This webpage has " + totalLinks + " links. " + nofollowLinks + " of them have rel='nofollow'.");
}

function adNfyellow(){
    var links = document.getElementsByTagName("a");
    for (var i = 0; i < links.length; i++) {
        if (links[i].rel == "nofollow") {
        links[i].style.backgroundColor = "yellow";
        links[i].style.padding = "5px 10px";
        links[i].style.fontWeight = "bold";
        }
}
}

function AdBroken(){
var links = document.getElementsByTagName("a");
    for (var i = 0; i < links.length; i++) {
        if (links[i].href && links[i].href.indexOf("http") === 0) {
            (function(link) {
            var xhr = new XMLHttpRequest();
            xhr.open("HEAD", link.href);
                xhr.onreadystatechange = function() {
                if (xhr.readyState === 4) {
                    if (xhr.status >= 400) {
                        link.style.backgroundColor = "#ff4500";
                        link.style.color = "#fff";
                        link.style.padding = "5px 10px";
                        link.style.fontWeight = "bold";
                    }
                }
                };
            xhr.send();
            })(links[i]);
        }
    }
}
</script>
