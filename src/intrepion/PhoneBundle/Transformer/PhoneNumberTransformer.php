<?php

namespace intrepion\PhoneBundle\Transformer;

use Symfony\Component\Form\DataTransformerInterface;
use Symfony\Component\Form\Exception\TransformationFailedException;
use Doctrine\Common\Persistence\ObjectManager;
use Acme\TaskBundle\Entity\Issue;

class PhoneNumberTransformer implements DataTransformerInterface
{
    /**
     */
    public function __construct()
    {
    }

    /**
     * Transforms the string ($norm) to a string ($view).
     *
     * @param  string $norm
     * @return string
     */
    public function transform($norm)
    {
        if (null === $norm) {
            return '';
        }

        return '(' . substr($norm, 0, 3) . ') ' . substr($norm, 3, 3) . '-' . substr($norm, 6, 4);
    }

    /**
     * Transforms a string ($view) to a string ($norm).
     *
     * @param  string $view
     * @return string
     * @throws TransformationFailedException if string ($view) is not a valid phone number.
     */
    public function reverseTransform($view)
    {
        $view = preg_replace('/1?\s*-?\s*\(?\s*(\d{3})\s*\)?\s*(\d{3})\s*-?\s*(\d{4})/', '$1$2$3', $view);
        if (10 !== strlen($view)) {
            throw new TransformationFailedException(sprintf(
                '"%s" is not a valid phone number!',
                $view
            ));
        }

        return $view;
    }
}
