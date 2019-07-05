namespace GYM
{
    partial class EmployeesForm
    {
        /// <summary>
        /// Required designer variable.
        /// </summary>
        private System.ComponentModel.IContainer components = null;

        /// <summary>
        /// Clean up any resources being used.
        /// </summary>
        /// <param name="disposing">true if managed resources should be disposed; otherwise, false.</param>
        protected override void Dispose(bool disposing)
        {
            if (disposing && (components != null))
            {
                components.Dispose();
            }
            base.Dispose(disposing);
        }

        #region Windows Form Designer generated code

        /// <summary>
        /// Required method for Designer support - do not modify
        /// the contents of this method with the code editor.
        /// </summary>
        private void InitializeComponent()
        {
            System.ComponentModel.ComponentResourceManager resources = new System.ComponentModel.ComponentResourceManager(typeof(EmployeesForm));
            this.lblWorkers = new System.Windows.Forms.Label();
            this.lblInstructors = new System.Windows.Forms.Label();
            this.rtbWorkers = new System.Windows.Forms.RichTextBox();
            this.rtbInstructors = new System.Windows.Forms.RichTextBox();
            this.SuspendLayout();
            // 
            // lblWorkers
            // 
            this.lblWorkers.AutoSize = true;
            this.lblWorkers.Location = new System.Drawing.Point(70, 14);
            this.lblWorkers.Name = "lblWorkers";
            this.lblWorkers.Size = new System.Drawing.Size(47, 13);
            this.lblWorkers.TabIndex = 0;
            this.lblWorkers.Text = "Workers";
            // 
            // lblInstructors
            // 
            this.lblInstructors.AutoSize = true;
            this.lblInstructors.Location = new System.Drawing.Point(328, 14);
            this.lblInstructors.Name = "lblInstructors";
            this.lblInstructors.Size = new System.Drawing.Size(56, 13);
            this.lblInstructors.TabIndex = 1;
            this.lblInstructors.Text = "Instructors";
            // 
            // rtbWorkers
            // 
            this.rtbWorkers.Font = new System.Drawing.Font("Microsoft Sans Serif", 12F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(238)));
            this.rtbWorkers.Location = new System.Drawing.Point(13, 49);
            this.rtbWorkers.Name = "rtbWorkers";
            this.rtbWorkers.Size = new System.Drawing.Size(175, 437);
            this.rtbWorkers.TabIndex = 2;
            this.rtbWorkers.Text = "";
            // 
            // rtbInstructors
            // 
            this.rtbInstructors.Font = new System.Drawing.Font("Microsoft Sans Serif", 12F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(238)));
            this.rtbInstructors.Location = new System.Drawing.Point(264, 49);
            this.rtbInstructors.Name = "rtbInstructors";
            this.rtbInstructors.Size = new System.Drawing.Size(175, 437);
            this.rtbInstructors.TabIndex = 3;
            this.rtbInstructors.Text = "";
            // 
            // EmployeesForm
            // 
            this.AutoScaleDimensions = new System.Drawing.SizeF(6F, 13F);
            this.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font;
            this.ClientSize = new System.Drawing.Size(451, 500);
            this.Controls.Add(this.rtbInstructors);
            this.Controls.Add(this.rtbWorkers);
            this.Controls.Add(this.lblInstructors);
            this.Controls.Add(this.lblWorkers);
            this.Icon = ((System.Drawing.Icon)(resources.GetObject("$this.Icon")));
            this.Name = "EmployeesForm";
            this.StartPosition = System.Windows.Forms.FormStartPosition.CenterScreen;
            this.Text = "WorkersForm";
            this.ResumeLayout(false);
            this.PerformLayout();

        }

        #endregion

        private System.Windows.Forms.Label lblWorkers;
        private System.Windows.Forms.Label lblInstructors;
        private System.Windows.Forms.RichTextBox rtbWorkers;
        private System.Windows.Forms.RichTextBox rtbInstructors;
    }
}