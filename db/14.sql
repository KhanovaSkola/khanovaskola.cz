
ALTER TABLE `user`
ADD `newsletter` enum('na','yes','no') NOT NULL DEFAULT 'na',
COMMENT='Uživatelé';
