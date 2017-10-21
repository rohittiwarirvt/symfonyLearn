<?php
/**
 * User Entity
 */

namespace Oy\CommonBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Oy\SearchBundle\Entity\Search;
use Oy\SearchBundle\Entity\SearchSave;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 * @ORM\Entity(repositoryClass="Oy\CommonBundle\Repository\UserRepository")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\ManyToOne(targetEntity="Oy\CommonBundle\Entity\Account")
     * @ORM\JoinColumn(name="account", referencedColumnName="id", nullable=true)
     **/
    protected $account;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    protected $first_name;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    protected $last_name;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    protected $company;

    /**
     * @var ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="Oy\SearchBundle\Entity\Search", mappedBy="author", cascade={"remove"})
     **/
    private $searches;

    /**
     * @var ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="Oy\SearchBundle\Entity\SearchSave", mappedBy="search", cascade={"remove"})
     **/
    private $save_search;

    /**
     * @var ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="Oy\CommonBundle\Entity\News", mappedBy="author", cascade={"remove"})
     **/
    private $news;

    public function __construct()
    {
        parent::__construct();
        $this->searches = new ArrayCollection();
        $this->news = new ArrayCollection();
    }

    /**
     * @return bool
     */
    public function isAdmin()
    {
        return (in_array(self::ROLE_SUPER_ADMIN, $this->roles));
    }

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
     * Set first_name
     *
     * @param  string $firstName
     * @return User
     */
    public function setFirstName($firstName)
    {
        $this->first_name = $firstName;

        return $this;
    }

    /**
     * Get first_name
     *
     * @return string
     */
    public function getFirstName()
    {
        return $this->first_name;
    }

    /**
     * Set last_name
     *
     * @param  string $lastName
     * @return User
     */
    public function setLastName($lastName)
    {
        $this->last_name = $lastName;

        return $this;
    }

    /**
     * Get last_name
     *
     * @return string
     */
    public function getLastName()
    {
        return $this->last_name;
    }

    /**
     * Get readable name for welcome text in header
     *
     * @return string
     */
    public function getWelcomeName()
    {
        return (!is_null($this->first_name)) ? $this->first_name : $this->username;
    }

    /**
     * Set account
     *
     * @param  \Oy\CommonBundle\Entity\Account $account
     * @return User
     */
    public function setAccount(\Oy\CommonBundle\Entity\Account $account = null)
    {
        $this->account = $account;

        return $this;
    }

    /**
     * Get account
     *
     * @return \Oy\CommonBundle\Entity\Account
     */
    public function getAccount()
    {
        return $this->account;
    }

    /**
     * Set company
     *
     * @param  string $company
     * @return User
     */
    public function setCompany($company)
    {
        $this->company = $company;

        return $this;
    }

    /**
     * Get company
     *
     * @return string
     */
    public function getCompany()
    {
        return $this->company;
    }

    public function getSiteRole()
    {
        $role = $this->getRoles()[0];

        return UserRoleType::getRoleName($role);
    }

    /**
     * Add searches
     *
     * @param  Search $searches
     * @return User
     */
    public function addSearch(Search $searches)
    {
        $this->searches[] = $searches;

        return $this;
    }

    /**
     * Remove searches
     *
     * @param Search $searches
     */
    public function removeSearch(Search $searches)
    {
        $this->searches->removeElement($searches);
    }

    /**
     * Get searches
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSearches()
    {
        return $this->searches;
    }

    /**
     * Add news
     *
     * @param  \Oy\CommonBundle\Entity\News $news
     * @return User
     */
    public function addNews(\Oy\CommonBundle\Entity\News $news)
    {
        $this->news[] = $news;

        return $this;
    }

    /**
     * Remove news
     *
     * @param \Oy\CommonBundle\Entity\News $news
     */
    public function removeNews(\Oy\CommonBundle\Entity\News $news)
    {
        $this->news->removeElement($news);
    }

    /**
     * Get news
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getNews()
    {
        return $this->news;
    }

    /**
     * Add save_search
     *
     * @param SearchSave $saveSearch
     * @return User
     */
    public function addSaveSearch(SearchSave $saveSearch)
    {
        $this->save_search[] = $saveSearch;

        return $this;
    }

    /**
     * Remove save_search
     *
     * @param SearchSave $saveSearch
     */
    public function removeSaveSearch(SearchSave $saveSearch)
    {
        $this->save_search->removeElement($saveSearch);
    }

    /**
     * Get save_search
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSaveSearch()
    {
        return $this->save_search;
    }

    /**
     * Get user's full name.
     *
     * @return string
     */
    public function getFullName()
    {
        return trim(sprintf('%s %s', $this->first_name, $this->last_name));
    }
}
