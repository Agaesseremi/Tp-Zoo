<?php

class AnimalsManager{

    private $db; 

    public function pretyDump($data){
        highlight_string("<?php\n\$data =\n" . var_export($data, true) . ";\n?>");
    }

    public function __construct(PDO $db)
    {
        $this->setDb($db);
    }


    public function setDb($db)
    {
        $this->db = $db;
    }

    public  function add(Animals $animal)
    {
        $query = $this->db->prepare('INSERT INTO Animals (name, class) VALUE (:name, :class)');
        $query->execute([
            'name' => $animal->getName(),
            'class' => $animal->getClass()
        ]);

    }

    public function findAllAlive()
    {
        $query = $this->db->query('SELECT * FROM Animals WHERE age > 0');
        $allAnimalsAlive = $query->fetchAll(PDO::FETCH_ASSOC);

        $allAnimalsAliveAsObject = [];

        foreach ($allAnimalsAlive as $data) {
            $animal = new Animals($data);
            array_push($allAnimalsAliveAsObject, $animal);
        }

        return $allAnimalsAliveAsObject;
    }

    public function findAnimalsWithoutEnclosure()
    {
        $query = $this->db->query('SELECT * FROM Animals WHERE enclos_id = 0');
        $allAnimalsAlive = $query->fetchAll(PDO::FETCH_ASSOC);

        $allAnimalsAliveAsObject = [];

        foreach ($allAnimalsAlive as $data) {
            $animal = new Animals($data);
            array_push($allAnimalsAliveAsObject, $animal);
        }

        return $allAnimalsAliveAsObject;
    }

    public function find(int $id)
    {
        $query = $this->db->prepare('SELECT * FROM Animals WHERE id = :id ');
        $query->execute([
            'id' => $id
        ]); 

        $data = $query->fetch();
        $animal = new $data['class']($data);
        return $animal;

    }

    public  function addEnclosure(Enclosures $enclosure)
    {
        $query = $this->db->prepare('INSERT INTO Enclosures (name, type) VALUE (:name, :type)');
        $query->execute([
            'name' => $enclosure->getName(),
            'type' => $enclosure->getType()
        ]);

    }

    public function findAllAliveEnclosure()
    {
        $query = $this->db->query('SELECT * FROM Enclosures');
        $allEnclosuresAlive = $query->fetchAll(PDO::FETCH_ASSOC);

        $allEnclosuresAliveAsObject = [];

       
        foreach ($allEnclosuresAlive as $data) {
            $enclosure = new Enclosures($data);
            
            $enclosure->setNbAnimal($this->howManyAnimal($enclosure->getId()));
            array_push($allEnclosuresAliveAsObject, $enclosure);
        }

        return $allEnclosuresAliveAsObject;
        
    }

    public function addAnimalToEnclosure(array $data){

        $query = $this->db->prepare('UPDATE Animals SET enclos_id = :id_enclosure WHERE id = :id_animal');
        $query->execute([
            'id_enclosure' => $data['id_enclosure'],
            'id_animal' => $data['id_animal']
        ]);
        
    }

    public function howManyAnimal($id) : int
    {

        $query = $this->db->prepare('SELECT * FROM Animals WHERE enclos_id = :id');
        $query->execute([
            'id' => $id
        ]);
        $animals = $query->fetchAll(PDO::FETCH_ASSOC);

        return count($animals);

    }

    public function uptdateAnimalToEnclosure(array $data){
        $query = $this->db->prepare('UPDATE Animals_To_Enclosures SET id_enclosure = ' . $data['id_enclosure'] . ', id_animal = ' . $data['id_animal']);
        $query->execute();
    }
    

    public function findAnimalsInEnclosure()
    {   
        $query = $this->db->prepare('SELECT * FROM Animals WHERE enclos_id = :enclos_id');
        $query->execute([
            'enclos_id' => $_POST['id']
        ]);

        $allAnimalsInEclosure = $query->fetchAll();

        $allAnimalsInEclosureAsObject = [];

        foreach ($allAnimalsInEclosure as $data) {
            $animal = new Animals($data);
            array_push($allAnimalsInEclosureAsObject, $animal);
        }

        return $allAnimalsInEclosureAsObject;
    }

    public function deleteEnclosure(){
        $query = $this->db->prepare('DELETE FROM Enclosures WHERE id = :enclos_id');
        $query->execute([
            'enclos_id' => $_POST['id']
        ]);
    }

    public function deleteAnimal(){
        $query = $this->db->prepare('DELETE FROM Animals WHERE id = :id');
        $query->execute([
            'id' => $_POST['id']
        ]);
    }
}