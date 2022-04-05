resource "aws_db_subnet_group" "aws_db_subnet_group" {
    name       = "aws_db_subnet_group"
    subnet_ids = [aws_subnet.private_subnet_1.id, aws_subnet.private_subnet_2.id]
}