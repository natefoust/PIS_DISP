<?php
require_once("../../Infrastructure/Repos/bussesRepo.php");
require_once("../../Domain/Entities/bus.php");
require_once("../../Infrastructure/Repos/routesRepo.php");
require_once("../../Domain/Entities/route.php");
require_once("../../Infrastructure/Repos/linesRepo.php");
require_once("../../Domain/Entities/line.php");

class dispLogic
{
    private bussesRepo $busRepo;
    private routesRepo $routesRepo;
    private linesRepo $linesRepo;


    public function __construct(bussesRepo $busRepo, routesRepo $routesRepo, linesRepo $linesRepo)
    {
        $this->busRepo = $busRepo;
        $this->routesRepo = $routesRepo;
        $this->linesRepo = $linesRepo;
    }

    public function showAllBusses()
    {
        $values = $this->busRepo->getAllBusses();

        echo '<table border=1>';
        echo '<tr> <th>№ маршрута</th> <th>Бортовой номер троллейбуса</th> </tr>';

        foreach ($values as $item)
        {
            echo '<tr>';
            echo '<td>'.$item->getTrailNumber().'</td>';
            echo '<td>'.$item->getRouteNumber().'</td>';
            echo '</tr>';
        }
        echo '<table>';
    }

    public function showAllRoutes()
    {
        $values = $this->routesRepo->getAllRoutes();



        foreach ($values as $item)
        {
            echo 'Маршрут № ';
            echo '<table border=1>';
            echo '<tr> <th>№ маршрута</th> <th>От</th> <th>До</th> <th>Бортовой номер</th> <th>Команда</th> </tr>';
            for ($i = 0; $i < $item->getCounter(); $i++)
            {
                echo '<tr>';
                echo '<td>'.$item->getRouteInfo()->getRouteNumber().'</td>';
                echo '<td>'.$item->getRouteInfo()->getRouteFrom().'</td>';
                echo '<td>'.$item->getRouteInfo()->getRouteTo().'</td>';
                echo '<td>'.$item->getBus($i)->getRouteNumber().'</td>';

                echo '</tr>';
            }
        }
        echo '<table>';

    }

    public function showAllLines()
    {
        $values = $this->linesRepo->getAllLines();
        echo '<table border=1>';
        echo '<tr> <th>№ маршрута</th> <th>От</th> <th>До</th><th>Бортовой номер троллейбуса</th>  </tr>';

        foreach ($values as $item)
        {
            echo '<tr>';
            echo '<td>'.$item->getTrailNumber().'</td>';
            echo '<td>'.$item->getRoutes()->getRouteInfo()->getRouteNumber().'</td>';
            echo '<td>'.$item->getRoutes()->getRouteInfo()->getRouteFrom().'</td>';
            echo '<td>'.$item->getRoutes()->getRouteInfo()->getRouteTo().'</td>';
            echo '<td>'.$item->getRoutes()->getBus()->getRouteNumber().'</td>';
            echo '</tr>';
        }
        echo '<table>';
    }


}
?>