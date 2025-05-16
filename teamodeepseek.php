<?php
// Consulta para obter as consultas disponíveis
$stmt = $pdo->prepare("
    SELECT 
        DATE(c.data_consulta) AS data,
        c.hora_consulta AS hora,
        p.nome AS nome_psicologo,
        p.crp
    FROM 
        consultas c
    JOIN 
        psicologos p ON c.psicologos_id = p.id
    WHERE 
        c.pacientes_id IS NULL
    ORDER BY 
        c.data_consulta, c.hora_consulta
");

$stmt->execute();
$consultas = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Organizar consultas por data
$consultasPorData = [];
foreach ($consultas as $consulta) {
    $data = $consulta['data'];
    if (!isset($consultasPorData[$data])) {
        $consultasPorData[$data] = [];
    }
    $consultasPorData[$data][] = $consulta;
}
?>

<style>
    .calendario {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        gap: 20px;
        margin-top: 30px;
    }
    
    .dia {
        border: 1px solid #e0e0e0;
        border-radius: 8px;
        padding: 15px;
        background-color: #fff;
        box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    }
    
    .data-header {
        font-size: 1.2em;
        font-weight: bold;
        color: #3a7bd5;
        margin-bottom: 10px;
        padding-bottom: 5px;
        border-bottom: 1px solid #eee;
    }
    
    .consulta-item {
        display: flex;
        justify-content: space-between;
        padding: 8px 0;
        border-bottom: 1px dashed #eee;
    }
    
    .consulta-item:last-child {
        border-bottom: none;
    }
    
    .hora {
        font-weight: bold;
        color: #555;
    }
    
    .psicologo {
        color: #666;
        font-size: 0.9em;
    }
    
    .sem-consultas {
        color: #999;
        font-style: italic;
        padding: 10px 0;
    }
</style>

<div class="calendario">
    <?php if (empty($consultasPorData)): ?>
        <div class="sem-consultas">Nenhuma consulta disponível no momento.</div>
    <?php else: ?>
        <?php foreach ($consultasPorData as $data => $consultasDoDia): ?>
            <div class="dia">
                <div class="data-header">
                    <?= date('d/m/Y', strtotime($data)) ?> - 
                    <?= date('l', strtotime($data)) ?>
                </div>
                
                <?php if (empty($consultasDoDia)): ?>
                    <div class="sem-consultas">Nenhum horário disponível</div>
                <?php else: ?>
                    <?php foreach ($consultasDoDia as $consulta): ?>
                        <div class="consulta-item">
                            <span class="hora">
                                <?= substr($consulta['hora'], 0, 5) ?>
                            </span>
                            <span class="psicologo">
                                <?= htmlspecialchars($consulta['nome_psicologo']) ?> (CRP: <?= htmlspecialchars($consulta['crp']) ?>)
                            </span>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>