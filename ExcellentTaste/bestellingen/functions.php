<?php

function hapjesLijst($pdo) {
    try {
        $stmt = $pdo->prepare("SELECT m.naam, m.id FROM menuitems m JOIN gerechtsoorten gs ON gs.id=m.gerechtsoort_id JOIN gerechtcategorien gc ON gc.id=gs.gerechtcategorie_id WHERE gc.naam='Hapjes'");
        $stmt->execute();
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $rows;
    } catch (PDOException $e) {
        return $e;
    }
}

function addBestelling($pdo, $r_id, $m_id, $aantal, $geserveerd) {

    try {
        $stmt = $pdo->prepare("INSERT INTO bestellingen (reservering_id, menuitem_id, aantal, geserveerd) VALUES (?, ?, ?, ?)");
        $stmt->execute([$r_id, $m_id, $aantal, $geserveerd]);
        return $pdo->lastInsertId();
    } catch (PDOException $e) {
        return $e;
    }
}

function bestelBon($pdo, $r_id) {
    try {
        $stmt = $pdo->prepare("SELECT b.menuitem_id, mi.naam, Count(b.menuitem_id) as aantal FROM bestellingen b JOIN menuitems mi ON mi.id=b.menuitem_id WHERE reservering_id= ? GROUP BY b.menuitem_id, mi.naam");
        $stmt->execute([$r_id]);
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $rows;
    } catch (PDOException $e) {
        return $e;
    }
}

function kokBon($pdo) {
    try {
        $stmt = $pdo->prepare("SELECT b.menuitem_id, mi.naam, Count(b.menuitem_id) as aantal FROM bestellingen b JOIN menuitems mi ON mi.id=b.menuitem_id WHERE reservering_id = 1 AND g.categorien IN ('Hapjes') GROUP BY b.menuitem_id, mi.naam");
        $stmt->execute();
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $rows;
    } catch (PDOException $e) {
        return $e;
    }
}