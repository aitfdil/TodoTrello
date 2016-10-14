<?php
/**
 * Created by PhpStorm.
 * User: vin
 * Date: 09/10/2016
 * Time: 19:40
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Column
 * @package AppBundle\Entity
 *
 * @ORM\Entity()
 * @ORM\Table(name="todo_column")
 */
class Column
{
    /**
     * @var int
     *
     * @ORM\Id()
     * @ORM\Column(name="id", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string")
     */
    private $name;
    /**
     * @var Todolist
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Todolist", inversedBy="columns")
     */
    private $todo;

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
     * Set name
     *
     * @param string $name
     *
     * @return Column
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set todo
     *
     * @param \AppBundle\Entity\Todolist $todo
     *
     * @return Column
     */
    public function setTodo(\AppBundle\Entity\Todolist $todo = null)
    {
        $this->todo = $todo;

        return $this;
    }

    /**
     * Get todo
     *
     * @return \AppBundle\Entity\Todolist
     */
    public function getTodo()
    {
        return $this->todo;
    }
}
