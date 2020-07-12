<?php
$db = mysqli_connect('localhost', 'root', 'root') or die('mark check');
mysqli_select_db($db, 'moviesite') or die(mysqli_error($db));

$query = 'CREATE TABLE reviews(
  review_movie_id INTEGER UNSIGNED NOT NULL,
  review_date DATE NOT NULL,
  reviewer_name VARCHAR(255) NOT NULL,
  review_comment VARCHAR(255) NOT NULL,
  review_rating TINYINT UNSIGNED NOT NULL DEFAULT 0,

  KEY (review_movie_id)
) ENGINE=MYISAM';

mysqli_query($db, $query) or die(mysqli_error($db));

$query = <<<ENDSQL
  INSERT INTO reviews
    (review_movie_id, review_date, reviewer_name, review_comment, review_rating)
  VALUES
    (3, '2020-05-11', '晧宇', 'erat fermentum justo nec condimentum neque sapien placerat ante nulla justo aliquam', 1),
    (1, '2020-05-01', '娅楠', 'iaculis diam erat fermentum justo nec condimentum neque sapien placerat ante nulla justo aliquam quis turpis eget', 1),
    (1, '2019-08-16', '展博', 'in sagittis dui vel nisl duis ac nibh fusce lacus purus aliquet at feugiat non pretium', 5),
    (1, '2019-06-25', '剑波', 'at velit vivamus vel nulla eget eros elementum pellentesque quisque porta volutpat', 1),
    (1, '2019-12-15', '漫妮', 'penatibus et magnis dis parturient montes nascetur ridiculus mus vivamus vestibulum sagittis sapien cum sociis natoque', 4),
    (1, '2020-06-15', '墨含', 'primis in faucibus orci luctus et ultrices posuere cubilia curae duis faucibus accumsan', 4),
    (3, '2019-11-17', '俊泽', 'odio donec vitae nisi nam ultrices libero non mattis pulvinar', 1),
    (1, '2019-12-23', '淑颖', 'sapien dignissim vestibulum vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae', 2),
    (3, '2019-07-09', '伟菘', 'posuere cubilia curae donec pharetra magna vestibulum aliquet ultrices erat tortor', 1),
    (2, '2019-11-02', '月婵', 'ullamcorper purus sit amet nulla quisque arcu libero rutrum ac lobortis vel dapibus at diam nam', 1),
    (2, '2019-06-24', '秩选', 'justo aliquam quis turpis eget elit sodales scelerisque mauris sit amet', 2),
    (2, '2019-12-27', '月婵', 'habitasse platea dictumst etiam faucibus cursus urna ut tellus nulla ut erat id mauris vulputate elementum nullam', 4),
    (3, '2019-10-26', '凰羽', 'ultrices posuere cubilia curae donec pharetra magna vestibulum aliquet ultrices erat tortor sollicitudin mi sit amet lobortis sapien', 2),
    (2, '2020-05-11', '晓晴', 'sit amet sem fusce consequat nulla nisl nunc nisl duis bibendum felis sed interdum venenatis turpis enim blandit mi', 3),
    (2, '2020-02-17', '培安', 'tempor turpis nec euismod scelerisque quam turpis adipiscing lorem vitae mattis nibh ligula nec', 2),
    (1, '2019-09-29', '宸赫', 'lacus curabitur at ipsum ac tellus semper interdum mauris ullamcorper purus sit amet', 2),
    (3, '2019-10-09', '佐仪', 'nec molestie sed justo pellentesque viverra pede ac diam cras pellentesque volutpat dui', 1),
    (3, '2020-01-13', '可馨', 'faucibus orci luctus et ultrices posuere cubilia curae mauris viverra', 1),
    (1, '2019-11-04', '思宇', 'quis turpis sed ante vivamus tortor duis mattis egestas metus aenean fermentum donec ut mauris eget massa tempor', 1),
    (2, '2020-04-28', '尹智', 'ligula sit amet eleifend pede libero quis orci nullam molestie nibh in lectus pellentesque', 2)
ENDSQL;

mysqli_query($db, $query) or die(mysqli_error($db));

echo 'success';
