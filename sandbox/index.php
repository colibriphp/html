<?php

    namespace Sandbox;

    use Colibri\Html\Element\AElement;
    use Colibri\Html\Element\BoldElement;
    use Colibri\Html\Element\ButtonElement;
    use Colibri\Html\Element\DivElement;
    use Colibri\Html\Element\FormElement;
    use Colibri\Html\Element\H1Element;
    use Colibri\Html\Element\InputButtonElement;
    use Colibri\Html\Element\InputCheckboxElement;
    use Colibri\Html\Element\InputPasswordElement;
    use Colibri\Html\Element\InputRadioElement;
    use Colibri\Html\Element\InputRangeElement;
    use Colibri\Html\Element\InputTextElement;
    use Colibri\Html\Element\ItalicElement;
    use Colibri\Html\Element\LiElement;
    use Colibri\Html\Element\OptgroupElement;
    use Colibri\Html\Element\OptionElement;
    use Colibri\Html\Element\ScriptElement;
    use Colibri\Html\Element\SelectElement;
    use Colibri\Html\Element\InputSubmitElement;
    use Colibri\Html\Element\SpanElement;
    use Colibri\Html\Element\TableElement;
    use Colibri\Html\Element\UlElement;
    use Colibri\Html\Tag;

    include_once "../vendor/autoload.php";

    error_reporting(1); ini_set('display_errors', 1);

    $rows   = [];

    foreach(['Ivan', 'Lol', 'Jake', 'Finn', 'Stewie'] as $item) {
        $rows[] = [
            $item, rand(18, 30), ['Y', 'N'][rand(0,1)],
            new AElement('/delete?name='. $item, 'Kill '. $item),
        ];
    }

//    echo Tag::table([
//        'Name', 'Age', 'Fucker', 'Actions'
//    ], $rows);

    $table = new TableElement();

    for($i = 0; $i < 15; $i++) {
        $row    = $table->row(new ItalicElement(new BoldElement("Row #$i")));
        for($j = 0; $j < 15; $j++) {
            $cell = $row->cell("Col #$j");
            $cell->addClass('td td-'.$j);
        }
    }

//    die(var_dump($table));

    echo $table;

    $text       = new H1Element(new ItalicElement('Hello world', [
        'data-inner-html' => new BoldElement('test', ['id' => 'click-me'])
    ]));

    $input      = new InputTextElement('email', 'none');
    $password   = new InputPasswordElement('passwd', '123qwe');

    $div        = (new DivElement( $input ))->appendContent($password);

    $div->addClass('test-class')->addClass('lol-class')->addClass('ok');

    $button     = new ButtonElement('do', new ItalicElement(new BoldElement('search...')));

    $div->appendContent($button);

    echo $text, $input, $password, $button, $div;

    echo '<hr>';

    $form   = new FormElement('/app/save_element.php', 'post', true, new InputSubmitElement('save!', null));

    $form->addClass('form-component')->id(md5(time()))->prependContent( $div->removeClass('ok') )->prependContent( $text );

    echo $form;

    $tableForm  = new TableElement();

    $tableForm->row('Test Form!!!')->cell($form);

    echo '<hr>';

    echo Tag::a('test', 'click me!')->addClass('col-md-12')->id('dezdezdez')->addClass('c');

    echo '<hr>';

    echo Tag::img('http://fox-fan.ru/news/269_1.jpg', 250, -1, 'rounded');

    $select = new SelectElement('geo_list', [
        1 => 'Ukraine',
        'Ukraine Regions' => [
            5 => 'Kiev',
            3    => 'Cherkassy'
        ],
        2 => 'Japan',
    ], rand(0, 9));

    echo new DivElement($select, ['style' => 'border: 1px solid red;']);

    $optgroup = new OptgroupElement();

    $optgroup->setAttribute('label', 'Test');

    for($i = 0; $i < 10; $i++) {
        $optgroup->appendContent((new OptionElement("Item $i"))->id("id-$i")->setAttribute('value', $i));
    }

    $select->prependContent($optgroup);

    $select->setName('countries');

    echo $select, (new ScriptElement('js/jquery.js'))->async(true);

    $select->addValues(range(1, 10));

    echo  $select;
    
    echo (new InputCheckboxElement('test', 'asd'));

    echo (new InputButtonElement('click me!!1'));

    $ul = new UlElement([
        new LiElement('Test item'),
        new LiElement('Test item 2'),
        new AElement('?test=qwerty', new LiElement('With link')),
        new BoldElement(new AElement('?test=qwerty', new LiElement('With link in bold')))
    ]);

    $ul->appendContent(new LiElement(
        [
            'inner cloned UL',
            clone($ul)
        ]
    ));

    $ul->appendContent(new LiElement([
        'simple text',
        new AElement('?go=нахуй', [
            new BoldElement('ok'),
            new ItalicElement(new SpanElement(' -> span'))
        ]),
        new ItalicElement(
            new BoldElement('!')
        )
    ]));

    for($i = 0; $i < 10; $i++) {
        if($i % 3 == 0) {
            $ul->appendContent(new AElement("?li=$i", new LiElement("item $i")));
        } else {
            $ul->appendContent(new LiElement("item $i"));
        }
    }

    echo $ul;

    echo $table, $tableForm;

    echo new InputRangeElement('age', 0, 70, 1, 25);
