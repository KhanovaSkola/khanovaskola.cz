
# drop non-unique rows
DELETE FROM `user` AS `t1`
WHERE EXISTS (
    SELECT 1 FROM `users` AS `t2`
    WHERE `t1`.`mail` = `t2`.`mail` AND `t1`.`id` > `t2`.`id`)

ALTER TABLE `user`
ADD UNIQUE `mail` (`mail`);
