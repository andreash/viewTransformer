<?php

namespace intrepion\PhoneBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ContactInfo
 */
class ContactInfo
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $home;

    /**
     * @var string
     */
    private $cell;

    /**
     * @var string
     */
    private $work;

    /**
     * @var string
     */
    private $fax;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set home
     *
     * @param string $home
     * @return ContactInfo
     */
    public function setHome($home)
    {
        $this->home = $home;
    
        return $this;
    }

    /**
     * Get home
     *
     * @return string 
     */
    public function getHome()
    {
        return $this->home;
    }

    /**
     * Set cell
     *
     * @param string $cell
     * @return ContactInfo
     */
    public function setCell($cell)
    {
        $this->cell = $cell;
    
        return $this;
    }

    /**
     * Get cell
     *
     * @return string 
     */
    public function getCell()
    {
        return $this->cell;
    }

    /**
     * Set work
     *
     * @param string $work
     * @return ContactInfo
     */
    public function setWork($work)
    {
        $this->work = $work;
    
        return $this;
    }

    /**
     * Get work
     *
     * @return string 
     */
    public function getWork()
    {
        return $this->work;
    }

    /**
     * Set fax
     *
     * @param string $fax
     * @return ContactInfo
     */
    public function setFax($fax)
    {
        $this->fax = $fax;
    
        return $this;
    }

    /**
     * Get fax
     *
     * @return string 
     */
    public function getFax()
    {
        return $this->fax;
    }
}
