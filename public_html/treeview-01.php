<?php
class Treeview01 extends Page {
    public function InitializeComponent() {
        parent::$PAGE_TITLE = "Tutorial : Simple Treeview";
        
        $tree = new TreeView("tree01");
        $root = new TreeViewFolder("root");
        
        $folder1 = new TreeViewFolder("folder1");
        $file1 = new TreeViewFile("file1");
        $file2 = new TreeViewFile("file2");
        $folder1->setTreeViewItems(
                new TreeViewItems($file1, $file2));
                
        $folder2 = new TreeViewFolder("folder2");
        $file3 = new TreeViewFile("file3");
        $file4 = new TreeViewFile("file4");
        $folder2->setTreeViewItems(
                new TreeViewItems($file3, $file4));
        $folder2->collapse();
                
        $folder3 = new TreeViewFolder("folder3");
        $file5 = new TreeViewFile("file5");
        $file6 = new TreeViewFile("file6");
        $folder3->setTreeViewItems(
                new TreeViewItems($file5, $file6));
        $folder3->collapse();
        
        $root->setTreeViewItems(
                new TreeViewItems($folder1, $folder2, $folder3));
                
        $tree->setTreeViewItems(
                new TreeViewItems($root));
        
        $this->render = $tree;
    }
}
?>