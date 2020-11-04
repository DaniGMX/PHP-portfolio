<?php

class Dropdown extends Element {
    private const TAG_DROPDOWN = "li";
    private const CLASS_DROPDOWN = "dropdown";
    private const CLASS_DROPDOWN_BUTTON = "dropbtn";

    private const TAG_DROPDOWN_CONTENT = 'div';
    private const CLASS_DROPDOWN_CONTENT = "dropdown-content";

    public function __construct(string $name, array $subNames, array $hrefs) {
        // make this the li element that will be held by the navbar
        parent::__construct(Dropdown::TAG_DROPDOWN, '', ['class' => Dropdown::CLASS_DROPDOWN]);

        // append the base button for the elements to pop from
        $this->appendChild(new Element('a', $name, ['herf' => 'javascript:void(0)', 'class' => Dropdown::CLASS_DROPDOWN_BUTTON]));
        
        // make the dropdown elements with the given parameters
        $dropdownElements = new Element(Dropdown::TAG_DROPDOWN_CONTENT, '', ['class' => Dropdown::CLASS_DROPDOWN_CONTENT]);
        foreach ($subNames as $index => $subName) {
            $dropdownElements->appendChild(new Element('a', $subName, ['href' => $hrefs[$index]]));
        }

        // append the dropdown elements that will be held
        $this->appendChild($dropdownElements);
    }
}

/**
 * Array Of Dropdowns class ensure these kind of arrays to hold
 * arrays that only contain Elements.
 */
class ArrayOfDropdowns extends ArrayObject {
    public function offsetSet($key, $val) {
        if ($val instanceof Dropdown) {
            return parent::offsetSet($key, $val);
        }
        throw new InvalidArgumentException('Value must be an Element');
    }
}

?>