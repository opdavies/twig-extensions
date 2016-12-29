<?php

namespace Opdavies\Twig\Extensions;

use InvalidArgumentException;
use Twig_Extension;
use Twig_SimpleFilter;

class TwigBooleanStringExtension extends Twig_Extension
{
    const BOOLEAN_STRING_TRUE = 'true';

    const BOOLEAN_STRING_FALSE = 'false';

    /**
     * {@inheritdoc}
     */
    public function getFilters()
    {
        return [
            new Twig_SimpleFilter('boolean_string', [$this, 'isBoolean']),
            new Twig_SimpleFilter('boolean_as_string', [$this, 'isBoolean']),
        ];
    }

    /**
     * Returns a 'true' or 'false' string based on the value of a boolean.
     *
     * @param bool $value
     *   The boolean to test.
     *
     * @return string
     *   A 'true' or 'false' string.
     *
     * @throws 
     idArgumentException
     */
    public function isBoolean($value)
    {
        if (!is_bool($value)) {
            throw new InvalidArgumentException('The value is not a boolean.');
        }

        return $value ? self::BOOLEAN_STRING_TRUE : self::BOOLEAN_STRING_FALSE;
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'boolean_string';
    }
}
