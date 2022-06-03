<?php

function reserveringenLijst($pdo) {
    try {
        $stmt = $pdo->prepare("SELECT reserveringen.id, reserveringen.klant_id, reserveringen.datum, reserveringen.tijd, reserveringen.tafel, reserveringen.aantal, klanten.naam, klanten.telefoon, klanten.email FROM klanten INNER JOIN reserveringen ON reserveringen.klant_id=klanten.id");
        $stmt->execute();
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $rows;
    } catch (PDOException $e) {
        return $e;
    }
}

