<html>

<head>
    <meta charset="UTF-8">
    <meta id="viewport" name="viewport" content="width=device-width, user-scalable=no">
    <title>Teste</title>
    <link rel="stylesheet" type="text/css" href="stylee.css" />
</head>

<body>
    <header>
        <div class="container">
            <div class="titulo">
                Listagem
            </div>
            <div class="menu">
                <nav>
                    <ul>
                        <li><a href="testes.php">PÁGINA INICIAL</a></li>

                    </ul>
                </nav>
            </div>

        </div>
    </header>
    <?php
    class Thesaurus
    {
        private $thesaurus;
        function __construct($thesaurus)
        {
            $this->thesaurus = $thesaurus;
        }

        public function getSynonyms($word)
        {
            $synonims = (!empty($this->thesaurus[$word]) ? $this->thesaurus[$word] : array());
            return json_encode(array('word' => $word, 'synonyms' => $synonims));
        }
    }
    $thesaurus = new Thesaurus(array(
        "buy" => array("purchase"),
        "big" => array("great", "large"),
        "speaks" => array("speech", "conversation")

    ));


    echo $thesaurus->getSynonyms("big") . "<br>";
    echo $thesaurus->getSynonyms("speaks");
?>
</body>

</html>