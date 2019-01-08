<div class="py-1">
	<h3 class="border-bottom border-gray pb-2 mb-3 text-info">
        <i class="fa fa-pie-chart"></i>
        SURVEY

        <!-- <button type="button" class="btn btn-info pull-right">
            <i class="fa fa-print"></i> PRINT
        </button> -->
    </h3>
    <div class="row">
        <div class="col-lg-3 border-right border-gray" style="height:380px">
            <ul class="nav flex-column">
                <li class="nav-item border-bottom border-gray">
                    <a class="nav-link" href="<?= base_url('/survey') ?>"><i class="fa fa-angle-double-right"></i> ALL</a>
                </li>
                <li class="nav-item border-bottom border-gray">
                    <a class="nav-link" href="<?= base_url('/survey/questions') ?>"><i class="fa fa-angle-double-right"></i> QUESTIONS</a>
                </li>
            </ul>
        </div>
        <div class="col-lg-9">
            <?php if ($page == "index") { ?>
                
                <div id="chart-all" style="height: 380px; width: 100%;"></div>

                <script>
                $("#chart-all").CanvasJSChart({
                    title: {
                        text: "Public Satisfaction Index Survey"
                    },
                    animationEnabled: true,
                    exportEnabled: true,
                    data: [{
                        type: "pie",
                        startAngle: 45,
                        showInLegend: "true",
                        legendText: "{label}",
                        indexLabel: "{label} ({y})",
                        yValueFormatString:"#,##0.#"%"",
                        dataPoints: [
                            { 
                                label: "Satisfied", 
                                y: <?= count($this->survey->where(["type" => "selection-success"])) ?>, 
                                color: "#28a745" },
                            { 
                                label: "Normal", 
                                y: <?= count($this->survey->where(["type" => "selection-warning"])) ?>, 
                                color: "#edb100" 
                            },
                            { 
                                label: "Disappointed", 
                                y: <?= count($this->survey->where(["type" => "selection-danger"])) ?>, 
                                color: "#d32535" 
                            },
                        ]
                    }]
                });
                </script>

            <?php } else { ?>
                <?php $no = 1; ?>
                <?php foreach ($this->question->get() as $key => $val) { ?>
                    <div class="border-bottom border-gray py-2 text-left mt-2" data-toggle="collapse" data-target="#target-collaps-<?= $val->code ?>" aria-expanded="false" aria-controls="collapseExample" style="cursor:pointer">
                        <?= $no . ". " . $val->question ?>

                        <span class="pull-right fa fa-arrow-circle-right pt-1"></span>
                    </div>
                    <div class="collapse" id="target-collaps-<?= $val->code ?>">
                        <div class="card card-body rounded-0">
                            
                            <div id="chart-<?= $val->code ?>" style="height: 400px; width: 100%;"></div>

                            <script>
                                $("#chart-<?= $val->code ?>").CanvasJSChart({
                                    title: {
                                        text: "Survey - Question Code : <?= $val->code ?>"
                                    },
                                    animationEnabled: true,
                                    exportEnabled: true,
                                    data: [{
                                        type: "pie",
                                        startAngle: 45,
                                        showInLegend: "true",
                                        legendText: "{label}",
                                        indexLabel: "{label} ({y})",
                                        yValueFormatString:"#,##0.#"%"",
                                        dataPoints: [
                                            { 
                                                label: "Satisfied", 
                                                y: <?= count($this->survey->where(["question_id" => $val->code, "type" => "selection-success"])) ?>, 
                                                color: "#28a745" },
                                            { 
                                                label: "Normal", 
                                                y: <?= count($this->survey->where(["question_id" => $val->code, "type" => "selection-warning"])) ?>, 
                                                color: "#edb100" 
                                            },
                                            { 
                                                label: "Disappointed", 
                                                y: <?= count($this->survey->where(["question_id" => $val->code, "type" => "selection-danger"])) ?>, 
                                                color: "#d32535" 
                                            },
                                        ]
                                    }]
                                });
                            </script>

                        </div>
                    </div>
                    <?php $no++; ?>
                <?php } ?>
            <?php } ?>
        </div>
    </div>
</div>