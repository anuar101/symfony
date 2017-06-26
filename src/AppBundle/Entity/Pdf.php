<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Pdf
 *
 * @ORM\Table(name="pdf")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UserRepository")
 */
class Pdf
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="heading", type="string", length=255)
     */
    private $heading;

    /**
     * @var string
     *
     * @ORM\Column(name="description1", type="string")
     */
    private $description1;

    /**
     * @var string
     *
     * @ORM\Column(name="description2", type="string")
     */
    private $description2;
    /**
     * @var string
     *
     * @ORM\Column(name="description3", type="string")
     */
    private $description3;

    /**
     * @var string
     *
     * @ORM\Column(name="description4", type="string")
     */
    private $description4;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string")
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="fullname", type="string")
     */
    private $fullname;

    /**
     * @var string
     *
     * @ORM\Column(name="contact", type="string")
     */
    private $contact;
    
    /**
     * @var string
     *
     * @ORM\Column(name="emailaddress", type="string")
     */
    private $emailaddress;

    /**
     * @var string
     *
     * @ORM\Column(name="website", type="string")
     */
    private $website;

    /**
     * @var string
     *
     * @ORM\Column(name="pdfname1", type="string")
     */
    private $pdfname1;

    /**
     * @var string
     *
     * @ORM\Column(name="pdfname2", type="string")
     */
    private $pdfname2;

    /**
     * @var string
     *
     * @ORM\Column(name="pdfname3", type="string")
     */
    private $pdfname3;

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set pdfname1
     *
     * @param string $pdfname1
     *
     * @return User
     */
    public function setPdfname1($pdfname1)
    {
        $this->pdfname1 = $pdfname1;

        return $this;
    }

    /**
     * Get heading
     *
     * @return string
     */
    public function getHeading()
    {
        return $this->heading;
    }    

    /**
     * Set website
     *
     * @param string $website
     *
     * @return User
     */
    public function setWebsite($website)
    {
        $this->website = $website;

        return $this;
    }

    /**
     * Get website
     *
     * @return string
     */
    public function getWebsite()
    {
        return $this->website;
    }
    /**
     * Set emailaddress
     *
     * @param string $emailaddress
     *
     * @return User
     */
    public function setEmailaddress($emailaddress)
    {
        $this->emailaddress = $emailaddress;

        return $this;
    }

    /**
     * Get emailaddress
     *
     * @return string
     */
    public function getEmailaddress()
    {
        return $this->emailaddress;
    }

    /**
     * Set contact
     *
     * @param string $contact
     *
     * @return User
     */
    public function setContact($contact)
    {
        $this->contact = $contact;

        return $this;
    }

    /**
     * Get contact
     *
     * @return string
     */
    public function getContact()
    {
        return $this->contact;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return User
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set fullname
     *
     * @param string $fullname
     *
     * @return User
     */
    public function setFullname($fullname)
    {
        $this->fullname = $fullname;

        return $this;
    }

    /**
     * Get fullname
     *
     * @return string
     */
    public function getFullname()
    {
        return $this->fullname;
    }


    /**
     * Set description1
     *
     * @param string $description1
     *
     * @return User
     */
    public function setDescription1($description1)
    {
        $this->description1 = $description1;

        return $this;
    }

    /**
     * Get description1
     *
     * @return string
     */
    public function getDescription1()
    {
        return $this->description1;
    }

    /**
     * Set description2
     *
     * @param string $description2
     *
     * @return User
     */
    public function setDescription2($description2)
    {
        $this->description2 = $description2;

        return $this;
    }

    /**
     * Get description2
     *
     * @return string
     */
    public function getDescription2()
    {
        return $this->description2;
    }

    /**
     * Set description3
     *
     * @param string $description3
     *
     * @return User
     */
    public function setDescription3($description3)
    {
        $this->description3 = $description3;

        return $this;
    }

    /**
     * Get description3
     *
     * @return string
     */
    public function getDescription3()
    {
        return $this->description3;
    }

    /**
     * Set description4
     *
     * @param string $description4
     *
     * @return User
     */
    public function setDescription4($description4)
    {
        $this->description4 = $description4;

        return $this;
    }

    /**
     * Get description4
     *
     * @return string
     */
    public function getDescription4()
    {
        return $this->description4;
    }


    /**
     * Set heading
     *
     * @param string $heading
     *
     * @return User
     */
    public function setHeading($heading)
    {
        $this->heading = $heading;

        return $this;
    }
    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return User
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get pdfname1
     *
     * @return string
     */
    public function getPdfname1()
    {
        return $this->pdfname1;
    }

    /**
     * Set pdfname2
     *
     * @param string $pdfname2
     *
     * @return pdfname2
     */
    public function setPdfname2($pdfname2)
    {
        $this->pdfname2 = $pdfname2;

        return $this;
    }

    /**
     * Get pdfname2
     *
     * @return string
     */
    public function getPdfname2()
    {
        return $this->pdfname2;
    }
    /**
     * Set pdfname3
     *
     * @param string $pdfname3
     *
     * @return User
     */
    public function setPdfname3($pdfname3)
    {
        $this->pdfname3 = $pdfname3;

        return $this;
    }

    /**
     * Get pdfname3
     *
     * @return string
     */
    public function getPdfname3()
    {
        return $this->pdfname3;
    }
}

