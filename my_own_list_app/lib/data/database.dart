import 'package:hive_flutter/hive_flutter.dart';

class ListDataBase {
  List toDoList = [];

  final _myBox = Hive.box("mybox");


  void createInitialData() {
    toDoList = [
    ["make a note.", false],
    ["this is normal.", false],
  ];
  }

  void loadData() {
    toDoList = _myBox.get("TODOLIST");
  }

  void updateDataBase() {
    _myBox.put("TODOLIST", toDoList);
  }
}