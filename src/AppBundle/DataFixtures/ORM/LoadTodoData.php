<?php
/**
 * Created by PhpStorm.
 * User: Vin
 * Date: 15/09/2016
 * Time: 16:35
 */

namespace AppBundle\DataFixtures\ORM;


use AppBundle\Entity\Todolist;
use AppBundle\Entity\Column;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\ReferenceRepository;
use Doctrine\Common\DataFixtures\SharedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadTodoData implements FixtureInterface
{

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $columns = $this->getColumns();

        $todo = new Todolist();
        $todo
            ->setName('Test')
            ->setDescription('This is a test')
        ;
        foreach ($columns as $column) {
            $todo->addColumn($column);
        }
        $manager->persist($todo);

        $todo = new Todolist();
        $todo
            ->setName('Symfony')
            ->setDescription('Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi consequuntur doloremque excepturi ipsa magnam minus nulla, odio vel veniam voluptate. Ab amet asperiores doloremque id mollitia nesciunt quia quod repudiandae!')
        ;
        $manager->persist($todo);

        $manager->flush();
    }

    /**
     * @return Column[]
     */
    private function getColumns()
    {
        $columns[] = (new Column())->setName('TODO');
        $columns[] = (new Column())->setName('DO');
        $columns[] = (new Column())->setName('DONE');

        return $columns;
    }

}