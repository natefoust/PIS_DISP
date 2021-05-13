<?php

require_once("../../Domain/IRepos/ILinesRepo.php");
require_once("../../Domain/Entities/line.php");
require_once("C:/xampp\htdocs\disp_system\hydrator.php");
require_once("routesRepo.php");

class linesRepo implements ILinesRepo
{
    private $connection;
    private $hydrator;
    private $routesRepo;

    /**
     * linesRepo constructor.
     * @param $connection
     */
    public function __construct($connection)
    {
        $this->connection = $connection;
        $this->hydrator = new Hydrator();
        $this->routesRepo = new routesRepo($this->connection);
    }

    public function getAllLines(): array
    {
        $query = "SELECT * FROM t_lines";
        $result = mysqli_query($this->connection, $query);
        $rows = mysqli_num_rows($result);
        $result = mysqli_fetch_assoc($result);

        $tmp = [];
        for($i = 0; $i < $rows; $i++) {

            $id = $this->hydrator->hydrate(lineId::class, [
               'id' => $i,
            ]);
            $route = $this->routesRepo->getAllRoutes();

            $entity = $this->hydrator->hydrate(lines::class, [
                'id' => $id,
            ]);

            foreach ($route as $item)
            {
                $entity->addRoute($item);
            }
        }

        return $tmp;
    }

}