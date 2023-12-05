// ignore_for_file: must_be_immutable

import 'package:flutter/material.dart';
import 'package:flutter_slidable/flutter_slidable.dart';

class ToDOListTile extends StatelessWidget {
  final String listName;
  final bool listCompleted;
  Function(bool?)? onChanged;
  Function(BuildContext)? deleteFunction;

  ToDOListTile({
    super.key,
    required this.listName,
    required this.listCompleted,
    required this.onChanged,
    required this.deleteFunction,
  });

  @override
  Widget build(BuildContext context) {
    return Padding(
      padding: const EdgeInsets.only(left: 25.0, right: 25.0, top: 50.0),
      child: Slidable(
        endActionPane: ActionPane(
          motion: const StretchMotion(),
          children: [
            SlidableAction(
              onPressed: deleteFunction,
              icon: Icons.delete,
              backgroundColor: const Color.fromRGBO(255, 0, 0, 1),
              borderRadius: BorderRadius.circular(12),
            )
          ],
        ),
        child: Container(
          decoration: BoxDecoration(
              color: Colors.black,
              borderRadius: BorderRadius.circular(12.0),
              boxShadow: [
                BoxShadow(
                  color: Colors.green.withOpacity(1),
                  spreadRadius: 2,
                  blurRadius: 5,
                  offset: const Offset(0, 1),
                )
              ]),
          child: Padding(
            padding: const EdgeInsets.all(24.0),
            child: Row(
              children: [
                Checkbox(
                  value: listCompleted,
                  onChanged: onChanged,
                  activeColor: Colors.black,
                  checkColor: Colors.green,
                  side: const BorderSide(width: 2, color: Colors.green),
                ),
                Text(
                  listName,
                  style: TextStyle(
                      color: const Color.fromRGBO(0, 255, 0, 1),
                      decoration: listCompleted
                          ? TextDecoration.lineThrough
                          : TextDecoration.none,
                      fontSize: 20),
                ),
              ],
            ),
          ),
        ),
      ),
    );
  }
}
