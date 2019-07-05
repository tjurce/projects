namespace GYM
{
    using System;
    using System.Collections.Generic;
    using System.ComponentModel.DataAnnotations;
    using System.ComponentModel.DataAnnotations.Schema;
    using System.Data.Entity.Spatial;

    public partial class Instructors
    {
        [System.Diagnostics.CodeAnalysis.SuppressMessage("Microsoft.Usage", "CA2214:DoNotCallOverridableMethodsInConstructors")]
        public Instructors()
        {
            WorkingFields = new HashSet<WorkingFields>();
        }

        [Key]
        [DatabaseGenerated(DatabaseGeneratedOption.None)]
        public int employeeId { get; set; }

        public double wagePerHour { get; set; }

        public int hours { get; set; }

        public virtual Employees Employees { get; set; }

        [System.Diagnostics.CodeAnalysis.SuppressMessage("Microsoft.Usage", "CA2227:CollectionPropertiesShouldBeReadOnly")]
        public virtual ICollection<WorkingFields> WorkingFields { get; set; }
    }
}
