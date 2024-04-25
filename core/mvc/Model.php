<?php

class Model
{
    protected array $records = [];

    public function __construct()
    {
        //
    }

    public function insert($record = [])
    {
        $records = $this->select()->get();
        $record = [
            "id" => $this->createID(),
            ...$record
        ];
        $records[] = $record;

        $file = fopen($this->getPath(), "w+") or die("Không thể thêm dữ liệu");
        fwrite($file, json_encode($records, JSON_UNESCAPED_UNICODE));
        fclose($file);

        $this->records = $records;

        return true;
    }

    public function select(): static
    {
        $records = json_decode(file_get_contents($this->getPath()), true);
        $this->records = $records;
        return $this;
    }

    protected function get()
    {
        return $this->records;
    }

    protected function first()
    {
        return $this->records[0] ?? false;
    }

    private function createID(): string
    {
        return uniqid() . md5(time() . uniqid() . rand(10000, 99999));
    }

    private function getPath(): string
    {
        return "data/$this->table.json";
    }

    protected function where($where): static
    {
        $keys = array_keys($where);

        $newRecords = [];
        foreach ($this->records as $record) {
            $check = true;
            foreach ($keys as $key) {
                if ($record[$key] != $where[$key]) {
                    $check = false;
                    break;
                }
            }
            if ($check) {
                $newRecords[] = $record;
            }
        }
        $this->records = $newRecords;
        return $this;
    }

    public function exist($params): bool
    {
        if (
            $this->select()->where($params)->first()
        ) {
            return true;
        }

        return false;
    }

    public function limit($start, $end)
    {
        $newRecords = [];
        for ($i = $start; $i <= $end; $i++) {
            if (!isset($this->records[$i])) {
                continue;
            }
            $newRecords[] = $this->records[$i];
        }
        $this->records = $newRecords;
        return $this;
    }

    public function orderBy($by)
    {
        if ($by = 'desc') {
            $this->records = array_reverse($this->records);
            return $this;
        }

        return $this;
    }
}