<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8" />
    <title><?php echo htmlspecialchars($pageContent['meta_title']); ?></title>
    <meta name="description" content="<?php echo htmlspecialchars($pageContent['meta_description'] ?? ''); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../views/css/style.css">
</head>
<body>
    <h1><?php echo htmlspecialchars($pageContent['title']); ?></h1>

    <p>Welkom op deze pagina! homepage</p>
    <h1><?php echo htmlspecialchars($widgetContent[1]['title'] ?? 'Widget niet gevonden'); ?></h1>
    <h1><?php echo htmlspecialchars($widgetContent[2]['description']);?></h1>
    <?php var_dump($widgetContent);?>

    <section class="service" id="services">
      <div class="titletop">
        <h1 class="white">Onze</h2>
        <h1 class="light-blue">Services</h2>
      </div>
      <div class="hr">
        <hr>
      </div>
      <div class="content">
        <div class="wrap">
          <div class="row">
            <div class="col4">
              <div class="card">
                <div>
                  <img src="./img/webdesign.jpg" alt>
                </div>
                <div class="info">
                  <div class="title">
                    <?php echo htmlspecialchars($widgetContent[1]['title']);?>
                  </div>
                  <div class="text">
                    <?php echo htmlspecialchars($widgetContent[1]['text']);?>
                  </div>
                  <div class="flex space-between text-bottom">
                    <div class="flex">
                      <div>
                        <i
                          class="fa-solid fa-pen icon small-image light-blue"></i>
                      </div>
                      <div class="flex align-center title-experience white">
                        <?php echo htmlspecialchars($widgetContent[1]['title']);?>
                      </div>
                    </div>
                    <div class="flex align-center">
                      <div>
                        <i class="fa-regular fa-clock small-image"
                          style="color: #3fd8be;"></i>

                      </div>
                      <div class="text-experience">
                        <?php echo htmlspecialchars($widgetContent[1]['description']);?>
                      </div>
                    </div>
                  </div>
                  <div>

                  </div>
                </div>
              </div>
            </div>
            <div class="col4">
              <div class="card">
                <div>
                  <img src="./img/webdevelopment.jpg" alt>
                </div>
                <div class="info">
                  <div class="title">
                    <?php echo htmlspecialchars($widgetContent[2]['title']);?>
                  </div>
                  <div class="text">
                    <?php echo htmlspecialchars($widgetContent[2]['text']);?>
                  </div>
                  <div class="flex space-between text-bottom">
                    <div class="flex">
                      <div>
                        <i
                          class="fa-solid fa-code icon small-image light-blue"></i>
                      </div>
                      <div class="flex align-center title-experience white">
                        <?php echo htmlspecialchars($widgetContent[2]['title']);?>
                      </div>
                    </div>
                    <div class="flex align-center">
                      <div>
                        <i class="fa-regular fa-clock small-image"
                          style="color: #3fd8be;"></i>

                      </div>
                      <div class="text-experience">
                        <?php echo htmlspecialchars($widgetContent[2]['description']);?>
                      </div>
                    </div>
                  </div>
                  <div>

                  </div>
                </div>
              </div>
            </div>
            <div class="col4">
              <div class="card">
                <div>
                  <img src="./img/webapplicatie.jpg" alt>
                </div>
                <div class="info">
                  <div class="title">
                    <?php echo htmlspecialchars($widgetContent[3]['title']);?>
                  </div>
                  <div class="text">
                    <?php echo htmlspecialchars($widgetContent[3]['text']);?>
                  </div>
                  <div class="flex space-between text-bottom">
                    <div class="flex">
                      <div>
                        <i
                          class="fa-solid fa-gears icon small-image light-blue"></i>
                      </div>
                      <div class="flex align-center title-experience white">
                        <?php echo htmlspecialchars($widgetContent[3]['title']);?>
                      </div>
                    </div>
                    <div class="flex align-center">
                      <div>
                        <i class="fa-regular fa-clock small-image"
                          style="color: #3fd8be;"></i>

                      </div>
                      <div class="text-experience">
                        <?php echo htmlspecialchars($widgetContent[3]['description']);?>
                      </div>
                    </div>
                  </div>
                  <div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>



</body>
</html>