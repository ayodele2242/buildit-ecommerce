
<?php
if($_GET['q'])
    {
        $search = ltrim($_GET['q']);
        $limit = 15;
        header("Content-type: application/json; charset={$charset}");
    if(!empty($search)
        $res = $conn->query("SELECT aid, name FROM titles WHERE LIKE '%".$search."%'");
        $data = array();
        while($row = $res->fetch_accoss())
        {
            $row['name'] = htmlspecialchars_uni($row['name']);
            $data[] = array('id' => $row['aid'], 'text' => $row['name']);
        }
        echo json_encode($data);
        exit;
    }
    ?>