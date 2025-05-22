<?php
// model/Ebike.php
class Ebike {
  private $conn;
  private $table = 'ebikes';

  public $id;
  public $manufacturer;
  public $model;
  public $zero_60;
  public $topspeed;
  public $curb_weight;
  public $horsepower;
  public $torque;
  public $price_start;
  public $picture;
  public $wiki;
  public $website;
  public $promo_video;
  public $summary;

  public function __construct($db) {
    $this->conn = $db;
  }

  public function read() {
    $query = 'SELECT * FROM ' . $this->table . ' ORDER BY id';
    $stmt = $this->conn->prepare($query);
    $stmt->execute();
    return $stmt;
  }

  public function read_single() {
    $query = 'SELECT * FROM ' . $this->table . ' WHERE id = ? LIMIT 1';
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(1, $this->id);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($row) {
      foreach ($row as $key => $value) {
        $this->$key = $value;
      }
      return true;
    }
    return false;
  }

  public function create() {
    $query = 'INSERT INTO ' . $this->table . '
      SET manufacturer = :manufacturer, model = :model, zero_60 = :zero_60,
          topspeed = :topspeed, curb_weight = :curb_weight,
          horsepower = :horsepower, torque = :torque, price_start = :price_start,
          picture = :picture, wiki = :wiki, website = :website,
          promo_video = :promo_video, summary = :summary';

    $stmt = $this->conn->prepare($query);

    $stmt->bindParam(':manufacturer', $this->manufacturer);
    $stmt->bindParam(':model', $this->model);
    $stmt->bindParam(':zero_60', $this->zero_60);
    $stmt->bindParam(':topspeed', $this->topspeed);
    $stmt->bindParam(':curb_weight', $this->curb_weight);
    $stmt->bindParam(':horsepower', $this->horsepower);
    $stmt->bindParam(':torque', $this->torque);
    $stmt->bindParam(':price_start', $this->price_start);
    $stmt->bindParam(':picture', $this->picture);
    $stmt->bindParam(':wiki', $this->wiki);
    $stmt->bindParam(':website', $this->website);
    $stmt->bindParam(':promo_video', $this->promo_video);
    $stmt->bindParam(':summary', $this->summary);

    return $stmt->execute();
  }

  public function update() {
    $query = 'UPDATE ' . $this->table . '
      SET manufacturer = :manufacturer, model = :model, zero_60 = :zero_60,
          topspeed = :topspeed, curb_weight = :curb_weight,
          horsepower = :horsepower, torque = :torque, price_start = :price_start,
          picture = :picture, wiki = :wiki, website = :website,
          promo_video = :promo_video, summary = :summary
      WHERE id = :id';

    $stmt = $this->conn->prepare($query);

    $stmt->bindParam(':id', $this->id);
    $stmt->bindParam(':manufacturer', $this->manufacturer);
    $stmt->bindParam(':model', $this->model);
    $stmt->bindParam(':zero_60', $this->zero_60);
    $stmt->bindParam(':topspeed', $this->topspeed);
    $stmt->bindParam(':curb_weight', $this->curb_weight);
    $stmt->bindParam(':horsepower', $this->horsepower);
    $stmt->bindParam(':torque', $this->torque);
    $stmt->bindParam(':price_start', $this->price_start);
    $stmt->bindParam(':picture', $this->picture);
    $stmt->bindParam(':wiki', $this->wiki);
    $stmt->bindParam(':website', $this->website);
    $stmt->bindParam(':promo_video', $this->promo_video);
    $stmt->bindParam(':summary', $this->summary);

    return $stmt->execute();
  }

  public function delete() {
    $query = 'DELETE FROM ' . $this->table . ' WHERE id = :id';
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':id', $this->id);
    return $stmt->execute();
  }
}
