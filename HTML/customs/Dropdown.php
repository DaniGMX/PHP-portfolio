<?php

class Dropdown extends Element{
    
    public const CLASS_NAME = 'dropdown';
    public const TAG = 'div';
    public const CLASS_BUTTON = 'drop_button';
    
    private Element $button;
    private array $dropped = [];
    private array $refs = [];

    public function __construct(string $content, array $droppedContents, array $refs)
    {
        // call to the Element constructor
        parent::__construct(Dropdown::TAG, $content, ['class', Dropdown::CLASS_NAME]);

        // make the button and append it first
        $this->button = new Element('button', $content, ['class' => Dropdown::CLASS_BUTTON]);
        $this->button->addStyles(Config::DropdownButtonStyle());
        $this->appendChild($this->button);

        // make the elements that will be dropped and append them to this element
        $droppedHolder = new Element('div', '', ['class' => 'dropdown-content']);
        foreach ($droppedContents as $i => $droppedContent)  {
            $this->dropped[] = $this->makeDroppedItem($droppedContent, $refs[$i]);
        }
        $droppedHolder->addStyles(Config::DropdownContent());
        $droppedHolder->appendChildren(new ArrayOfElements($this->dropped));
        $this->appendChild($droppedHolder);
        
        // Lastly add the config styles for the Dropdown
        $this->addStyles(Config::DropdownStyle());
    }

    private function makeDroppedItem($content, $ref) {
        $newDropElement = new Element('a', $content);
        $newDropElement->addStyles(Config::DropdownContentA());
        $newDropElement->addAttribute('href', $ref);
        return $newDropElement;
    }

}

/*

<div class="dropdown">
    <button class="dropbtn">Dropdown 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="#">Link 1</a>
      <a href="#">Link 2</a>
      <a href="#">Link 3</a>
    </div>
  </div> 

*/

?>